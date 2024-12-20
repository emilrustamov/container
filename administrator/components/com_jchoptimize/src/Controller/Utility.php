<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 * @package   jchoptimize/joomla-platform
 * @author    Samuel Marshall <samuel@jch-optimize.net>
 * @copyright Copyright (c) 2020 Samuel Marshall / JCH Optimize
 * @license   GNU/GPLv3, or later. See LICENSE file
 *
 * If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Controller;

use Exception;
use JchOptimize\Core\Admin\Tasks;
use JchOptimize\Core\Mvc\Controller;
use JchOptimize\Core\Uri\UploadedFile;
use JchOptimize\Model\BulkSettings;
use JchOptimize\Model\Cache;
use JchOptimize\Model\ModeSwitcher;
use JchOptimize\Model\OrderPlugins;
use JchOptimize\Model\ReCache;
use JchOptimize\Model\TogglePlugins;
use Joomla\CMS\Application\AdministratorApplication;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Filesystem\File;
use Joomla\Input\Input;

use function base64_decode;
use function defined;
use function ob_clean;

use const UPLOAD_ERR_CANT_WRITE;
use const UPLOAD_ERR_EXTENSION;
use const UPLOAD_ERR_FORM_SIZE;
use const UPLOAD_ERR_INI_SIZE;
use const UPLOAD_ERR_NO_FILE;
use const UPLOAD_ERR_NO_TMP_DIR;
use const UPLOAD_ERR_OK;
use const UPLOAD_ERR_PARTIAL;

defined('_JEXEC') or die('Restricted Access');

class Utility extends Controller
{
    /**
     * Message to enqueue by application
     *
     * @var string
     */
    private string $message = '';

    /**
     * Message type
     *
     * @var string
     */
    private string $messageType = 'success';

    /**
     * Url to redirect to
     *
     * @var string
     */
    private string $redirectUrl;

    /**
     * @var OrderPlugins
     */
    private OrderPlugins $orderPluginsModel;

    /**
     */
    private Cache $cacheModel;

    private TogglePlugins $togglePluginsModel;

    private BulkSettings $bulkSettings;

    /**
     * Constructor
     *
     * @param OrderPlugins $orderPluginsModel
     * @param Cache $cacheModel
     * @param TogglePlugins $togglePluginsModel
     * @param BulkSettings $bulkSettings
     * @param Input|null $input
     * @param AdministratorApplication|null $app
     */
    public function __construct(
        OrderPlugins $orderPluginsModel,
        Cache $cacheModel,
        TogglePlugins $togglePluginsModel,
        BulkSettings $bulkSettings,
        ?Input $input = null,
        ?AdministratorApplication $app = null
    ) {
        $this->orderPluginsModel = $orderPluginsModel;
        $this->cacheModel = $cacheModel;
        $this->togglePluginsModel = $togglePluginsModel;
        $this->bulkSettings = $bulkSettings;

        $this->redirectUrl = Route::_('index.php?option=com_jchoptimize', false);

        parent::__construct($input, $app);
    }

    public function execute()
    {
        /** @var Input $input */
        $input = $this->getInput();

        $this->{$input->get('task', 'default')}();

        /** @var string $return */
        $return = $input->get('return', '', 'base64');
        if ($return) {
            $this->redirectUrl = Route::_(base64_decode($return));
        }

        /** @var AdministratorApplication $app */
        $app = $this->getApplication();
        $app->enqueueMessage($this->message, $this->messageType);
        $app->redirect($this->redirectUrl);

        return true;
    }

    private function browsercaching(): void
    {
        $success = null;

        $expires = Tasks::leverageBrowserCaching($success);

        if ($success === false) {
            $this->message = Text::_('COM_JCHOPTIMIZE_LEVERAGEBROWSERCACHE_FAILED');
            $this->messageType = 'error';
        } elseif ($expires === 'FILEDOESNTEXIST') {
            $this->message = Text::_('COM_JCHOPTIMIZE_LEVERAGEBROWSERCACHE_FILEDOESNTEXIST');
            $this->messageType = 'warning';
        } elseif ($expires === 'CODEUPDATEDSUCCESS') {
            $this->message = Text::_('COM_JCHOPTIMIZE_LEVERAGEBROWSERCACHE_CODEUPDATEDSUCCESS');
        } elseif ($expires === 'CODEUPDATEDFAIL') {
            $this->message = Text::_('COM_JCHOPTIMIZE_LEVERAGEBROWSERCACHE_CODEUPDATEDFAIL');
            $this->messageType = 'notice';
        } else {
            $this->message = Text::_('COM_JCHOPTIMIZE_LEVERAGEBROWSERCACHE_SUCCESS');
        }
    }

    private function cleancache(): void
    {
        $deleted = $this->cacheModel->cleanCache();

        if (!$deleted) {
            $this->message = Text::_('COM_JCHOPTIMIZE_CACHECLEAN_FAILED');
            $this->messageType = 'error';
        } else {
            $this->message = Text::_('COM_JCHOPTIMIZE_CACHECLEAN_SUCCESS');
        }
    }

    private function togglepagecache(): void
    {
        $this->message = Text::_('COM_JCHOPTIMIZE_TOGGLE_PAGE_CACHE_FAILURE');
        $this->messageType = 'error';

        if (JCH_PRO === '1') {
            /** @var ModeSwitcher $modeSwitcher */
            $modeSwitcher = $this->getContainer()->get(ModeSwitcher::class);
            $result = $modeSwitcher->togglePageCacheState();
        } else {
            $result = $this->togglePluginsModel->togglePageCacheState('jchoptimizepagecache');
        }

        if ($result) {
            $this->message = Text::sprintf('COM_JCHOPTIMIZE_TOGGLE_PAGE_CACHE_SUCCESS', 'enabled');
            $this->messageType = 'success';
        }
    }

    private function keycache(): void
    {
        Tasks::generateNewCacheKey();

        $this->message = Text::_('COM_JCHOPTIMIZE_CACHE_KEY_GENERATED');
    }

    private function orderplugins(): void
    {
        $saved = $this->orderPluginsModel->orderPlugins();

        if ($saved === false) {
            $this->message = Text::_('JLIB_APPLICATION_ERROR_REORDER_FAILED');
            $this->messageType = 'error';
        } else {
            $this->message = Text::_('JLIB_APPLICATION_SUCCESS_ORDERING_SAVED');
        }
    }

    private function restoreimages(): void
    {
        $mResult = Tasks::restoreBackupImages();

        if ($mResult === 'SOMEIMAGESDIDNTRESTORE') {
            $this->message = Text::_('COM_JCHOPTIMIZE_SOMERESTOREIMAGE_FAILED');
            $this->messageType = 'warning';
        } elseif ($mResult === 'BACKUPPATHDOESNTEXIST') {
            $this->message = Text::_('COM_JCHOPTIMIZE_BACKUPPATH_DOESNT_EXIST');
            $this->messageType = 'warning';
        } else {
            $this->message = Text::_('COM_JCHOPTIMIZE_RESTOREIMAGE_SUCCESS');
        }

        $this->redirectUrl = Route::_('index.php?option=com_jchoptimize&view=OptimizeImages', false);
    }

    private function deletebackups(): void
    {
        $mResult = Tasks::deleteBackupImages();

        if ($mResult === false) {
            $this->message = Text::_('COM_JCHOPTIMIZE_DELETEBACKUPS_FAILED');
            $this->messageType = 'error';
        } elseif ($mResult === 'BACKUPPATHDOESNTEXIST') {
            $this->message = Text::_('COM_JCHOPTIMIZE_BACKUPPATH_DOESNT_EXIST');
            $this->messageType = 'warning';
        } else {
            $this->message = Text::_('COM_JCHOPTIMIZE_DELETEBACKUPS_SUCCESS');
        }

        $this->redirectUrl = Route::_('index.php?option=com_jchoptimize&view=OptimizeImages', false);
    }

    private function recache(): void
    {
        if (JCH_PRO === '1') {
            /** @var ReCache $reCacheModel */
            $reCacheModel = $this->getContainer()->get(ReCache::class);
            $redirectUrl = Route::_('index.php?option=com_jchoptimize', false, 0, true);
            $reCacheModel->reCache($redirectUrl);
        }

        $this->redirectUrl = Route::_('index.php?options=');
    }

    /**
     * @return void
     */
    private function importsettings()
    {
        $input = $this->getInput();

        assert($input instanceof Input);

        /** @psalm-var array{tmp_name:string, size:int, error:int, name:string|null, type:string|null}|null $file */
        $file = $input->files->get('file');

        if (empty($file)) {
            $this->message = Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_NO_FILE');
            $this->messageType = 'error';

            return;
        }

        $uploadErrorMap = [
            UPLOAD_ERR_OK => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_OK'),
            UPLOAD_ERR_INI_SIZE => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_INI_SIZE'),
            UPLOAD_ERR_FORM_SIZE => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_FORM_SIZE'),
            UPLOAD_ERR_PARTIAL => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_PARTIAL'),
            UPLOAD_ERR_NO_FILE => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_NO_FILE'),
            UPLOAD_ERR_NO_TMP_DIR => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_NO_TMP_DIR'),
            UPLOAD_ERR_CANT_WRITE => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_CANT_WRITE'),
            UPLOAD_ERR_EXTENSION => Text::_('COM_JCHOPTIMIZE_UPLOAD_ERR_EXTENSION')
        ];

        try {
            $uploadedFile = new UploadedFile(
                $file['tmp_name'],
                $file['size'],
                $file['error'],
                $file['name'],
                $file['type']
            );

            if ($uploadedFile->getError() !== UPLOAD_ERR_OK) {
                throw new Exception(Text::_($uploadErrorMap[$uploadedFile->getError()]));
            }
        } catch (Exception $e) {
            $this->message = Text::sprintf('COM_JCHOPTIMIZE_UPLOADED_FILE_ERROR', $e->getMessage());
            $this->messageType = 'error';

            return;
        }

        try {
            $this->bulkSettings->importSettings($uploadedFile);
        } catch (Exception $e) {
            $this->message = Text::sprintf('COM_JCHOPTIMIZE_IMPORT_SETTINGS_ERROR', $e->getMessage());
            $this->messageType = 'error';

            return;
        }

        $this->message = Text::_('COM_JCHOPTIMIZE_SUCCESSFULLY_IMPORTED_SETTINGS');
    }

    private function exportsettings(): void
    {
        $file = $this->bulkSettings->exportSettings();

        if (file_exists($file)) {
            /** @var AdministratorApplication $app */
            $app = $this->getApplication();
            $app->setHeader('Content-Description', 'FileTransfer');
            $app->setHeader('Content-Type', 'application/json');
            $app->setHeader('Content-Disposition', 'attachment; filename="' . basename($file) . '"');
            $app->setHeader('Expires', '0');
            $app->setHeader('Cache-Control', 'must-revalidate');
            $app->setHeader('Pragma', 'public');
            $app->setHeader('Content-Length', (string)filesize($file));
            $app->sendHeaders();

            ob_clean();
            flush();
            readfile($file);

            File::delete($file);

            $app->close();
        }
    }

    /**
     * @return void
     */
    private function setdefaultsettings()
    {
        try {
            $this->bulkSettings->setDefaultSettings();
        } catch (Exception $e) {
            $this->message = Text::_('COM_JCHOPTIMIZE_RESTORE_DEFAULT_SETTINGS_FAILED');
            $this->messageType = 'error';

            return;
        }

        $this->message = Text::_('COM_JCHOPTIMIZE_DEFAULT_SETTINGS_RESTORED');
    }

    private function default(): void
    {
        $this->redirectUrl = Route::_('index.php?option=com_jchoptimize', false);
    }
}
