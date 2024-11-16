<?php

namespace JchOptimize\Core\Admin\API;

use Exception;
use JchOptimize\Core\Admin\Ajax\OptimizeImage;
use JchOptimize\Core\Admin\Helper as AdminHelper;
use Joomla\DI\Container;
use Joomla\Input\Input;

use function array_shift;
use function count;
use function filesize;
use function in_array;
use function is_dir;
use function opendir;
use function preg_match;
use function readdir;

class ProcessImagesByFolders extends \JchOptimize\Core\Admin\API\AbstractProcessImages
{
    private array $pendingDir;
    private array $pendingFiles;
    /**
     * @var resource|null
     */
    private $handle = null;
    private string $currentDir = '';
    public function __construct(Container $container, \JchOptimize\Core\Admin\API\MessageEventInterface $messageEventObj)
    {
        parent::__construct($container, $messageEventObj);
        $input = $this->getContainer()->get(Input::class);
        $this->pendingDir = $input->get('subdirs', [], 'array');
        $this->pendingFiles = $input->get('files', [], 'array');
    }
    public function getFilePackages(): array
    {
        $excludes = [OptimizeImage::$backup_folder_name];
        [$files, $totalFileSize] = $this->initializeFileArray();
        do {
            try {
                $file = $this->getNextFile();
            } catch (Exception $e) {
                return $files;
            }
            if ($file != '.' && $file != '..' && !in_array($file, $excludes)) {
                $fullPath = $this->currentDir . '/' . \ltrim($file, '/\\');
                if (is_dir($fullPath) && $this->params->get('recursive', '1')) {
                    $this->pendingDir[] = $fullPath;
                } elseif (preg_match('#\\.(?:gif|jpe?g|png)$#i', $file)) {
                    if ($this->params->get('ignore_optimized', '1') && in_array($fullPath, AdminHelper::getOptimizedFiles()) && $this->currentDir != '') {
                        continue;
                    }
                    $fileSize = filesize($fullPath);
                    //Skip file if it's too large
                    if ($fileSize > $this->maxUploadFilesize) {
                        $this->messageEventObj->send('Skipping ' . AdminHelper::maskFileName($fullPath) . ': Too large!');
                        continue;
                    }
                    $totalFileSize += $fileSize;
                    if ($totalFileSize > $this->maxUploadFilesize) {
                        $this->prevFiles[] = $fullPath;
                        $this->prevFileSize = $fileSize;
                        return $files;
                    }
                    $files['images'][] = $fullPath;
                }
            }
        } while (count($files['images']) < $this->getMaxFileUploads());
        return $files;
    }
    /**
     * @throws Exception
     */
    private function getNextFile(): string
    {
        if (!empty($this->pendingFiles)) {
            return $this->getPendingFiles();
        }
        if ($this->currentDir == '' && !empty($this->pendingDir)) {
            $this->currentDir = $this->getPendingDir();
        }
        if ($this->currentDir === '') {
            throw new Exception('No paths to read');
        }
        if ($this->handle === null) {
            $this->handle = opendir($this->currentDir);
        }
        if ($this->handle === \false) {
            throw new Exception('Failed opening dir');
        }
        $file = readdir($this->handle);
        //No more files in directory
        if ($file === \false) {
            $this->handle = null;
            $this->currentDir = '';
            return $this->getNextFile();
        }
        return $file;
    }
    private function getPendingDir(): string
    {
        return array_shift($this->pendingDir);
    }
    private function getPendingFiles(): string
    {
        return array_shift($this->pendingFiles);
    }
    public function hasPendingImages(): bool
    {
        return !empty($this->pendingFiles) || !empty($this->pendingDir) || $this->currentDir !== '';
    }
}
