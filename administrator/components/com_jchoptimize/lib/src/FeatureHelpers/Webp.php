<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 * @package   jchoptimize/core
 * @author    Samuel Marshall <samuel@jch-optimize.net>
 * @copyright Copyright (c) 2022 Samuel Marshall / JCH Optimize
 * @license   GNU/GPLv3, or later. See LICENSE file
 *
 *  If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Core\FeatureHelpers;

use JchOptimize\Core\Admin\Helper as AdminHelper;
use JchOptimize\Core\Browser;
use JchOptimize\Core\Css\Parser;
use JchOptimize\Core\Helper;
use JchOptimize\Core\Html\Elements\BaseElement;
use JchOptimize\Core\Html\Elements\Img;
use JchOptimize\Core\Html\Elements\Input;
use JchOptimize\Core\Html\HtmlElementInterface;
use JchOptimize\Core\Uri\UriComparator;
use JchOptimize\Core\Uri\UriConverter;
use JchOptimize\Core\Uri\Utils;
use JchOptimize\Platform\Paths;
use Joomla\Filesystem\Folder;
use _JchOptimizeVendor\Psr\Http\Message\UriInterface;

use function array_map;
use function defined;
use function file_exists;
use function pathinfo;
use function preg_replace_callback;
use function rawurldecode;
use function str_replace;

defined('_JCH_EXEC') or die('Restricted access');
class Webp extends \JchOptimize\Core\FeatureHelpers\AbstractFeatureHelper
{
    private bool $testRunning = \false;
    /**
     * @param BaseElement $element
     * @return void
     */
    public function convert(HtmlElementInterface $element): void
    {
        if ($element instanceof Img || $element instanceof Input) {
            if (($src = $element->getSrc()) instanceof UriInterface) {
                $srcWebpValue = $this->getWebpImages($src);
                $element->src($srcWebpValue);
            }
            if ($element instanceof Img && $element->hasAttribute('srcset')) {
                $srcSet = $element->getSrcset();
                $urls = Helper::extractUrlsFromSrcset($srcSet);
                $webpUrls = array_map(function (UriInterface $v) {
                    return (string) $this->getWebpImages($v);
                }, $urls);
                if ($urls != $webpUrls) {
                    $webpSrcSet = str_replace($urls, $webpUrls, $srcSet);
                    $element->srcset($webpSrcSet);
                }
            }
        } elseif (($style = $element->getStyle()) !== \false) {
            $style = preg_replace_callback("#" . Parser::cssUrlWithCaptureValueToken(\true) . '#i', function ($matches) {
                if (!empty($matches[1])) {
                    $webp = $this->getWebpImages(Utils::uriFor($matches[1]));
                    return str_replace($matches[1], (string) $webp, $matches[0]);
                }
                return $matches[0];
            }, $style);
            $element->style($style);
        }
    }
    public function getWebpImages(UriInterface $imageUri): UriInterface
    {
        if ($imageUri->getScheme() == 'data' || !self::canIUse()) {
            return $imageUri;
        }
        $imagePath = UriConverter::uriToFilePath($imageUri);
        $aPotentialPaths = [self::getWebpPath($imagePath), self::getWebpPathLegacy($imagePath)];
        foreach ($aPotentialPaths as $potentialWebpPath) {
            if ($this->fileExists($potentialWebpPath)) {
                //replace file system path with root relative path
                $webpRootUrl = str_replace(Paths::nextGenImagesPath(), Paths::nextGenImagesPath(\true), $potentialWebpPath);
                $webpImageUri = $imageUri->withPath($webpRootUrl);
                if (!UriComparator::isCrossOrigin($webpImageUri)) {
                    return UriConverter::absToNetworkPathReference($webpImageUri);
                }
                return $webpImageUri;
            }
        }
        return $imageUri;
    }
    public function fileExists(string $path): bool
    {
        if ($this->testRunning) {
            return \true;
        }
        return @file_exists($path);
    }
    /**
     * Tries to determine if client supports WEBP images based on https://caniuse.com/webp
     */
    protected static function canIUse(): bool
    {
        $browser = Browser::getInstance();
        $browserName = $browser->getBrowser();
        //WEBP only supported in Safari running on MacOS 11 or higher, best to avoid.
        if ($browserName == 'Internet Explorer' || $browserName == 'Safari') {
            return \false;
        }
        return \true;
    }
    /**
     * @param string $originalImagePath
     * @return string
     */
    public static function getWebpPathLegacy(string $originalImagePath): string
    {
        if (!file_exists(Paths::nextGenImagesPath())) {
            Folder::create(Paths::nextGenImagesPath());
        }
        $fileParts = pathinfo(AdminHelper::contractFileNameLegacy($originalImagePath));
        return Paths::nextGenImagesPath() . '/' . $fileParts['filename'] . '.webp';
    }
    /**
     * @param string $originalImagePath
     * @return string
     */
    public static function getWebpPath(string $originalImagePath): string
    {
        if (!file_exists(Paths::nextGenImagesPath())) {
            Folder::create(Paths::nextGenImagesPath());
        }
        $fileParts = pathinfo(AdminHelper::contractFileName($originalImagePath));
        return Paths::nextGenImagesPath() . '/' . rawurldecode($fileParts['filename']) . '.webp';
    }
    public function enableTestRunning(): void
    {
        $this->testRunning = \true;
    }
}
