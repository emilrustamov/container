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

namespace JchOptimize\Platform;

use JchOptimize\Core\Helper;
use JchOptimize\Core\Interfaces\Paths as PathsInterface;
use JchOptimize\Core\SystemUri;
use JchOptimize\Core\Uri\Uri;
use JchOptimize\Core\Uri\Utils;
use JchOptimize\GetApplicationTrait;
use Joomla\CMS\Router\Route as JRoute;
use Joomla\CMS\Uri\Uri as JUri;

use phpDocumentor\Reflection\Types\String_;

use function defined;
use function dirname;
use function str_replace;
use function version_compare;

use const DIRECTORY_SEPARATOR;

defined('_JEXEC') or die('Restricted access');

/**
 * @package     JchOptimize\Platform
 *
 * @since       version
 *
 * A $path variable is considered an absolute path on the local filesystem without any trailing slashes.
 * Relative $paths will be indicated in their names or parameters.
 * A $folder is a representation of a directory with front and trailing slashes.
 * A $directory is the filesystem path to a directory with a trailing slash.
 */
class Paths implements PathsInterface
{
    use GetApplicationTrait;

    /**
     * Returns root relative path to the /assets/ folder
     *
     * @param bool $pathonly
     *
     * @return string
     */
    public static function relAssetPath(bool $pathonly = false): string
    {
        return self::baseFolder() . 'media/com_jchoptimize/assets';
    }

    private static function baseFolder(): string
    {
        return str_replace('administrator/', '', SystemUri::basePath());
    }

    public static function iconsUrl(): string
    {
        return self::baseFolder() . 'media/com_jchoptimize/icons';
    }

    /**
     * Returns path to the directory where static combined css/js files are saved.
     *
     * @param bool $isRootRelative If true, returns root relative path, otherwise, the absolute path
     *
     * @return string
     */
    public static function cachePath(bool $isRootRelative = true): string
    {
        $sCache = 'media/com_jchoptimize/cache';

        if ($isRootRelative) {
            //Returns the root relative url to the cache directory
            return self::baseFolder() . $sCache;
        } else {
            //Returns the absolute path to the cache directory
            return self::rootPath() . '/' . $sCache;
        }
    }

    /**
     * @return string Absolute path to root of site
     */
    public static function rootPath(): string
    {
        /** @var string */
        return JPATH_ROOT;
    }

    /**
     * Path to the directory where generated sprite images are saved
     *
     * @param bool $isRootRelative If true, return the root relative path with trailing slash;
     *                                 if false, return the absolute path without trailing slash.
     *
     * @return string
     */
    public static function spritePath(bool $isRootRelative = false): string
    {
        return ($isRootRelative ? self::baseFolder() : self::rootPath() . '/') . 'images/jch-optimize';
    }

    /**
     * Find the absolute path to a resource given a root relative path
     *
     * @param string $url Root relative path of resource on the site
     *
     * @return string
     */
    public static function absolutePath(string $url): string
    {
        return self::rootPath() . DIRECTORY_SEPARATOR . trim(str_replace('/', DIRECTORY_SEPARATOR, $url), '\\/');
    }

    /**
     * The base folder for rewrites when the combined files are delivered with PHP using mod_rewrite. Generally the parent directory for the
     * /media/ folder with a root relative path
     *
     * @return string
     */
    public static function rewriteBaseFolder(): string
    {
        return Helper::getBaseFolder();
    }

    /**
     * Convert the absolute filepath of a resource to a url
     *
     * @param string $path Absolute path of resource
     *
     * @return string
     */
    public static function path2Url(string $path): string
    {
        $oUri = clone JUri::getInstance();

        return $oUri->toString(['scheme', 'user', 'pass', 'host', 'port']) . self::baseFolder() .
            Helper::strReplace(self::rootPath() . DIRECTORY_SEPARATOR, '', $path);
    }

    /**
     * Url to access Ajax functionality
     *
     * @param string $function Action to be performed by Ajax function
     *
     * @return string
     */
    public static function ajaxUrl(string $function): string
    {
        $url = JUri::getInstance()->toString(['scheme', 'user', 'pass', 'host', 'port']);
        $url .= self::baseFolder();
        $url .= 'index.php?option=com_ajax&plugin=' . $function . '&format=raw';

        return $url;
    }

    /**
     * Url used in administrator settings page to perform certain tasks
     *
     * @param string $name
     *
     * @return string
     */
    public static function adminController(string $name): string
    {
        return JRoute::_('index.php?option=com_jchoptimize&view=Utility&task=' . $name, false);
    }

    /**
     * Parent directory of the folder where the original images are backed up in the Optimize Image Feature
     *
     * @return string
     */
    public static function backupImagesParentDir(): string
    {
        return self::rootPath() . '/images/';
    }

    public static function nextGenImagesPath($isRootRelative = false): string
    {
        return ($isRootRelative ? self::baseFolder() : self::rootPath() . '/') . 'images/jch-optimize/ng';
    }

    public static function getLogsPath(): string
    {
        /** @var string $logsPath */
        $logsPath = self::getApplication()->get('log_path');

        return $logsPath;
    }

    public static function mediaUrl(): string
    {
        return self::baseFolder() . 'media/com_jchoptimize';
    }

    public static function homeBasePath(): string
    {
        return str_replace('/administrator', '', JUri::base(true));
    }

    /**
     * @inheritDoc
     */
    public static function homeBaseFullPath(): string
    {
        return str_replace('/administrator', '', JUri::base());
    }

    /**
     * @inheritDoc
     */
    public static function captureCacheDir(bool $isRootRelative = false): string
    {
        return self::rootRelativePath($isRootRelative) . 'media/com_jchoptimize/cache/html';
    }

    private static function rootRelativePath(bool $isRootRelative): string
    {
        return ($isRootRelative ? self::baseFolder() : self::rootPath() . '/');
    }

    public static function cacheDir(): string
    {
        return self::cacheBase() . '/com_jchoptimize';
    }

    private static function cacheBase(): string
    {
        $app = self::getApplication();
        $cachePath = version_compare(JVERSION, '4.0', 'ge') ? JPATH_CACHE : str_replace(
            '/administrator',
            '',
            JPATH_CACHE
        );
        /** @var string $cacheBase */
        $cacheBase = $app->get('cache_path', $cachePath);

        if (Uri::isRelativePathReference(Utils::uriFor($cacheBase))) {
            $cacheBase = Paths::rootPath() . DIRECTORY_SEPARATOR . $cacheBase;
        }

        return $cacheBase;
    }

    public static function templatePath(): string
    {
        return dirname(__FILE__, 3) . '/tmpl';
    }

    public static function templateCachePath(): string
    {
        return self::cacheBase() . '/com_jchoptimize/compiled_templates';
    }

    public static function responsiveImagePath($isRootRelative = false): string
    {
        return ($isRootRelative ? self::baseFolder() : self::rootPath() . '/') . 'images/jch-optimize/rs';
    }
}
