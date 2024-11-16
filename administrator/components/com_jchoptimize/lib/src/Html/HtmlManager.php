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

namespace JchOptimize\Core\Html;

use _JchOptimizeVendor\GuzzleHttp\Psr7\Uri;
use _JchOptimizeVendor\GuzzleHttp\Psr7\UriResolver;
use JchOptimize\Core\Cdn;
use JchOptimize\Core\Container\ContainerAwareTrait;
use JchOptimize\Core\Exception;
use JchOptimize\Core\FeatureHelpers\DynamicJs;
use JchOptimize\Core\Helper;
use JchOptimize\Core\Http2Preload;
use JchOptimize\Core\Output;
use JchOptimize\Core\Registry;
use JchOptimize\Core\SystemUri;
use JchOptimize\Core\Uri\UriComparator;
use JchOptimize\Core\Uri\Utils;
use JchOptimize\Platform\Paths;
use JchOptimize\Platform\Profiler;
use Joomla\DI\ContainerAwareInterface;
use Joomla\Filesystem\File;
use _JchOptimizeVendor\Laminas\Cache\Storage\FlushableInterface;
use _JchOptimizeVendor\Laminas\Cache\Storage\StorageInterface;
use _JchOptimizeVendor\Laminas\EventManager\EventManager;
use _JchOptimizeVendor\Laminas\EventManager\EventManagerAwareInterface;
use _JchOptimizeVendor\Laminas\EventManager\EventManagerAwareTrait;
use _JchOptimizeVendor\Laminas\EventManager\EventManagerInterface;
use _JchOptimizeVendor\Laminas\EventManager\SharedEventManagerInterface;
use _JchOptimizeVendor\Psr\Http\Message\UriInterface;

use function array_key_last;
use function array_pop;
use function array_shift;
use function defined;
use function extension_loaded;
use function file_exists;
use function get_class;
use function implode;
use function ini_get;
use function preg_replace;
use function str_replace;
use function strtoupper;
use function ucfirst;

use const PHP_EOL;

defined('_JCH_EXEC') or die('Restricted access');
class HtmlManager implements ContainerAwareInterface, EventManagerAwareInterface
{
    use ContainerAwareTrait;
    use EventManagerAwareTrait;

    /**
     * @var EventManagerInterface|null
     */
    protected $events = null;
    /**
     * @var Processor $oProcessor
     */
    private \JchOptimize\Core\Html\Processor $oProcessor;
    /**
     */
    private Registry $params;
    /**
     * @var AsyncManager
     */
    private ?\JchOptimize\Core\Html\AsyncManager $asyncManager = null;
    /**
     * @var FilesManager
     */
    private \JchOptimize\Core\Html\FilesManager $filesManager;
    /**
     * @var StorageInterface $cache
     */
    private StorageInterface $cache;
    /**
     * @var Cdn
     */
    private Cdn $cdn;
    /**
     * @var Http2Preload
     */
    private Http2Preload $http2Preload;
    /**
     * Constructor
     *
     * @param Registry $params
     * @param Processor $processor
     * @param FilesManager $filesManager
     * @param Cdn $cdn
     * @param Http2Preload $http2Preload
     * @param StorageInterface $cache
     * @param SharedEventManagerInterface $sharedEventManager
     */
    public function __construct(Registry $params, \JchOptimize\Core\Html\Processor $processor, \JchOptimize\Core\Html\FilesManager $filesManager, Cdn $cdn, Http2Preload $http2Preload, StorageInterface $cache, SharedEventManagerInterface $sharedEventManager)
    {
        $this->params = $params;
        $this->oProcessor = $processor;
        $this->filesManager = $filesManager;
        $this->cdn = $cdn;
        $this->http2Preload = $http2Preload;
        $this->cache = $cache;
        if (JCH_PRO) {
            $this->asyncManager = new \JchOptimize\Core\Html\AsyncManager($params);
        }
        $this->setEventManager(new EventManager($sharedEventManager));
    }
    public function prependChildToHead(string $child): void
    {
        $headHtml = preg_replace('#<title[^>]*+>#i', $child . "\n\t" . '\\0', $this->oProcessor->getHeadHtml(), 1);
        $this->oProcessor->setHeadHtml($headHtml);
    }
    public function addCriticalCssToHead(string $criticalCss, ?string $id): void
    {
        //Remove CSS from HTML
        $replacements = $this->filesManager->cssReplacements[0];
        $html = $this->oProcessor->getFullHtml();
        $html = str_replace($replacements, '', $html);
        $this->oProcessor->setFullHtml($html);
        $criticalStyle = \JchOptimize\Core\Html\HtmlElementBuilder::style()->id('jch-optimize-critical-css')->data('id', $id)->addChild(PHP_EOL . $criticalCss . PHP_EOL)->render();
        $this->appendChildToHead($criticalStyle, \true);
    }
    public function appendChildToHead(string $sChild, bool $bCleanReplacement = \false): void
    {
        if ($bCleanReplacement) {
            $sChild = Helper::cleanReplacement($sChild);
        }
        $sHeadHtml = $this->oProcessor->getHeadHtml();
        $sHeadHtml = preg_replace('#' . \JchOptimize\Core\Html\Parser::htmlClosingHeadTagToken() . '#i', $sChild . PHP_EOL . "\t" . '</head>', $sHeadHtml, 1);
        $this->oProcessor->setHeadHtml($sHeadHtml);
    }
    public function addExcludedJsToSection(string $section): void
    {
        $aExcludedJs = $this->filesManager->aExcludedJs;
        if (!empty($aExcludedJs)) {
            $html = $this->oProcessor->getFullHtml();
            $html = str_replace($aExcludedJs, '', $html);
            $this->oProcessor->setFullHtml($html);
            //Add excluded javascript files to the bottom of the HTML section
            $sExcludedJs = implode(PHP_EOL, $aExcludedJs);
            $sExcludedJs = Helper::cleanReplacement($sExcludedJs);
            $this->appendChildToHTML($sExcludedJs, $section);
        }
    }
    public function appendChildToHTML(string $child, string $section): void
    {
        $sSearchArea = preg_replace(
            /** @see Parser::htmlClosingHeadTagToken() */
            /** @see Parser::htmlClosingBodyTagToken() */
            '#' . \JchOptimize\Core\Html\Parser::{'htmlClosing' . strtoupper($section) . 'TagToken'}() . '#si',
            "\t" . $child . PHP_EOL . '</' . $section . '>',
            $this->oProcessor->getFullHtml(),
            1
        );
        $this->oProcessor->setFullHtml($sSearchArea);
    }
    public function addDeferredJs(string $section): void
    {
        $defers = $this->filesManager->defers;
        //Remove deferred files from original location
        $defersRemoveArray = \array_column(\array_reduce($defers, 'array_merge', []), 'script');
        $html = $this->oProcessor->getFullHtml();
        $html = str_replace($defersRemoveArray, '', $html);
        $this->oProcessor->setFullHtml($html);
        //If we're loading javascript dynamically add the deferred javascript files to array
        // of files to load dynamically instead
        if ($this->params->get('pro_reduce_unused_js_enable', '0')) {
            /** @see DynamicJs::prepareJsDynamicUrls() */
            $this->container->get(DynamicJs::class)->prepareJsDynamicUrls($defers);
        } elseif (!empty($defers[0])) {
            //Otherwise if there are any defers we just add them to the bottom of the page
            foreach ($defers as $deferGroup) {
                foreach ($deferGroup as $deferArray) {
                    $this->appendChildToHTML($deferArray['script'], $section);
                }
            }
        }
    }
    public function setImgAttributes($aCachedImgAttributes): void
    {
        $sHtml = $this->oProcessor->getBodyHtml();
        $this->oProcessor->setBodyHtml(str_replace($this->oProcessor->images[0], $aCachedImgAttributes, $sHtml));
    }
    /**
     * Insert url of aggregated file in html
     *
     * @param string $id
     * @param string $type
     * @param string $section Whether section being processed is head|body
     * @param int $linksKey Index key of combined file
     *
     * @throws Exception\RuntimeException
     */
    public function replaceLinks(string $id, string $type, string $section = 'head', int $linksKey = 0): void
    {
        JCH_DEBUG ? Profiler::start('ReplaceLinks - ' . $type) : null;
        $searchArea = $this->oProcessor->getFullHtml();
        //All js files after the last excluded js will be placed at bottom of section
        if ($type == 'js' && $this->noMoreExcludedJsFiles($linksKey)) {
            $url = $this->buildUrl($id, 'js');
            //If last combined file is being inserted at the bottom of the page then
            //add the async or defer attribute
            if ($section == 'body') {
                $defer = \false;
                $async = \false;
                if ($this->params->get('loadAsynchronous', '0')) {
                    if ($this->filesManager->bLoadJsAsync) {
                        $async = \true;
                    } else {
                        $defer = \true;
                    }
                }
                //Add async attribute to last combined js file if option is set
                $newLink = $this->getNewJsLink((string) $url, $defer, $async);
            } else {
                $newLink = $this->getNewJsLink((string) $url);
            }
            //Remove replacements for this index
            $replacements = $this->filesManager->jsReplacements[$linksKey];
            $searchArea = str_replace($replacements, '', $searchArea);
            //Insert script tag at the appropriate section in the HTML
            $searchArea = preg_replace(
                /** @see Parser::htmlClosingHeadTagToken() */
                /** @see Parser::htmlClosingBodyTagToken() */
                '#' . \JchOptimize\Core\Html\Parser::{'htmlClosing' . strtoupper($section) . 'TagToken'}() . '#si',
                "\t" . $newLink . PHP_EOL . '</' . $section . '>',
                $searchArea,
                1
            );
        } else {
            $url = $this->buildUrl($id, $type);
            $newLink = $this->{'getNew' . ucfirst($type) . 'Link'}($url);
            //Get replacements for this index
            $replacements = $this->filesManager->{$type . 'Replacements'}[$linksKey];
            //If CSS, place combined file at location of first file in array
            if ($type == 'css') {
                $marker = array_shift($replacements);
                //Otherwise, place combined file at location of last file in array
            } else {
                //If a files was excluded PEO at this index, use as marker
                if (!empty($this->filesManager->jsMarker[$linksKey])) {
                    $marker = $this->filesManager->jsMarker[$linksKey];
                    $newLink .= PHP_EOL . "\t" . $marker;
                } else {
                    $marker = array_pop($replacements);
                }
            }
            $searchArea = str_replace($marker, $newLink, $searchArea);
            $searchArea = str_replace($replacements, '', $searchArea);
        }
        $this->oProcessor->setFullHtml($searchArea);
        JCH_DEBUG ? Profiler::stop('ReplaceLinks - ' . $type, \true) : null;
    }
    public function noMoreExcludedJsFiles($index): bool
    {
        return empty($this->filesManager->jsMarker) || $index > array_key_last($this->filesManager->jsMarker);
    }
    /**
     * Returns url of aggregated file
     *
     * @param string $id
     * @param string $type css or js
     *
     * @return UriInterface Url of aggregated file
     */
    public function buildUrl(string $id, string $type): UriInterface
    {
        $htaccess = $this->params->get('htaccess', 2);
        $uri = Utils::uriFor(Paths::relAssetPath());
        switch ($htaccess) {
            case '1':
            case '3':
                $uri = $htaccess == 3 ? $uri->withPath($uri->getPath() . '3') : $uri;
                $uri = $uri->withPath($uri->getPath() . Paths::rewriteBaseFolder() . ($this->isGz() ? 'gz' : 'nz') . '/' . $id . '.' . $type);
                break;
            case '0':
                $uri = $uri->withPath($uri->getPath() . '2/jscss.php');
                $aVar = array();
                $aVar['f'] = $id;
                $aVar['type'] = $type;
                $aVar['gz'] = $this->isGZ() ? 'gz' : 'nz';
                $uri = Uri::withQueryValues($uri, $aVar);
                break;
            case '2':
            default:
                //Get cache Url, this will be embedded in the HTML
                $uri = Utils::uriFor(Paths::cachePath());
                $uri = $uri->withPath($uri->getPath() . '/' . $type . '/' . $id . '.' . $type);
                // . ($this->isGz() ? '.gz' : '');
                $this->createStaticFiles($id, $type);
                break;
        }
        return $this->cdn->loadCdnResource($uri);
    }
    /**
     * Check if gzip is set or enabled
     *
     * @return bool   True if gzip parameter set and server is enabled
     */
    public function isGZ(): bool
    {
        return $this->params->get('gzip', 0) && extension_loaded('zlib') && !ini_get('zlib.output_compression') && ini_get('output_handler') != 'ob_gzhandler';
    }
    /**
     * Create static combined file if not yet exists
     *
     *
     * @param string $id Cache id of file
     * @param string $type Type of file css|js
     *
     * @return void
     */
    protected function createStaticFiles(string $id, string $type): void
    {
        JCH_DEBUG ? Profiler::start('CreateStaticFiles - ' . $type) : null;
        //Get cache filesystem path to create file
        $uri = Utils::uriFor(Paths::cachePath(\false));
        $uri = $uri->withPath($uri->getPath() . '/' . $type . '/' . $id . '.' . $type);
        //File path of combined file
        $combinedFile = (string) $uri;
        if (!file_exists($combinedFile)) {
            $vars = ['f' => $id, 'type' => $type];
            $content = Output::getCombinedFile($vars, \false);
            if ($content === \false) {
                throw new Exception\RuntimeException('Error retrieving combined contents');
            }
            //Create file and any directory
            if (!File::write($combinedFile, $content)) {
                if ($this->cache instanceof FlushableInterface) {
                    $this->cache->flush();
                }
                throw new Exception\RuntimeException('Error creating static file');
            }
        }
        JCH_DEBUG ? Profiler::stop('CreateStaticFiles - ' . $type, \true) : null;
    }
    /**
     * @param string $url Url of file
     * @param bool $isDefer If true the 'defer attribute will be added to the script element
     * @param bool $isASync If true the 'async' attribute will be added to the script element
     *
     * @return string
     */
    public function getNewJsLink(string $url, bool $isDefer = \false, bool $isASync = \false): string
    {
        $script = \JchOptimize\Core\Html\HtmlElementBuilder::script()->src($url);
        if ($isDefer) {
            $script->defer();
        }
        if ($isASync) {
            $script->async();
        }
        return $script->render();
    }
    /**
     * @param UriInterface[] $cssUrls
     *
     * @psalm-param list{0?: UriInterface,...} $cssUrls
     */
    public function loadCssAsync(array $cssUrls): void
    {
        if (!$this->params->get('pro_reduce_unused_css', '0')) {
            foreach ($cssUrls as $url) {
                $this->appendChildToHead($this->getPreloadStyleSheet($url, 'all', 'low'));
            }
        } elseif (JCH_PRO) {
            $this->getAsyncManager()->loadCssAsync($cssUrls);
        }
    }
    public function getPreloadStyleSheet(string $url, string $media, string $fetchPriority = 'auto'): string
    {
        $attr = ['as' => 'style', 'onload' => 'this.rel=\'stylesheet\'', 'href' => $url, 'media' => $media];
        if ($fetchPriority != 'auto') {
            $attr['fetchpriority'] = $fetchPriority;
        }
        return $this->getPreloadLink($attr);
    }
    public function getPreloadLink(array $attr): string
    {
        $link = \JchOptimize\Core\Html\HtmlElementBuilder::link()->rel('preload')->attributes($attr);
        if ($link->getHref() instanceof UriInterface && UriComparator::isCrossOrigin(UriResolver::resolve(SystemUri::currentUri(), $link->getHref()))) {
            $link->crossorigin();
        }
        return $link->render();
    }
    public function appendAsyncScriptsToHead(): void
    {
        if (JCH_PRO) {
            $script = $this->cleanScript($this->getAsyncManager()->printHeaderScript());
            if ($script) {
                $this->appendChildToHead($script);
            }
        }
    }
    /**
     *
     * @param string $script
     *
     * @return string
     */
    protected function cleanScript(string $script): string
    {
        if (!Helper::isXhtml($this->oProcessor->getHtml())) {
            $script = str_replace(array('<script type="text/javascript"><![CDATA[', '<script><![CDATA[', ']]></script>'), array('<script type="text/javascript">', '<script>', '</script>'), $script);
        }
        return $script;
    }
    public function addJsLazyLoadAssetsToHtml(string $id, string $section): void
    {
        $url = $this->buildUrl($id, 'js');
        $script = $this->getNewJsLink((string) $url, \false, \true);
        $this->appendChildToHTML($script, $section);
    }
    /**
     * @param string $url Url of file
     *
     * @return string
     */
    public function getNewCssLink(string $url): string
    {
        return \JchOptimize\Core\Html\HtmlElementBuilder::link()->rel('stylesheet')->href($url)->render();
    }
    public function getPreconnectLink(UriInterface $originUri): string
    {
        $origin = Uri::composeComponents($originUri->getScheme(), $originUri->getAuthority(), '', '', '');
        $link = \JchOptimize\Core\Html\HtmlElementBuilder::link()->rel('preconnect')->href($origin);
        if (UriComparator::isCrossOrigin($originUri)) {
            $link->crossorigin();
        }
        return $link->render();
    }
    public function getModulePreloadLink(string $url): string
    {
        return \JchOptimize\Core\Html\HtmlElementBuilder::link()->rel('modulepreload')->href($url)->fetchpriority('low')->render();
    }
    public function preProcessHtml(): void
    {
        JCH_DEBUG ? Profiler::start('PreProcessHtml') : null;
        $this->getEventManager()->trigger(__FUNCTION__, $this);
        JCH_DEBUG ? Profiler::start('PreProcessHtml', \true) : null;
    }
    public function postProcessHtml(): void
    {
        JCH_DEBUG ? Profiler::start('PostProcessHtml') : null;
        $this->getEventManager()->trigger(__FUNCTION__, $this);
        JCH_DEBUG ? Profiler::stop('PostProcessHtml', \true) : null;
    }
    public function removeCSSLinks(int|string $cssLinksKey): void
    {
        $replacements = $this->filesManager->cssReplacements[$cssLinksKey];
        $html = str_replace($replacements, '', $this->oProcessor->getHtml());
        $this->oProcessor->setHtml($html);
    }
    public function removeJsLinks(int|string $jsLinksKey): void
    {
        $replacements = $this->filesManager->jsReplacements[$jsLinksKey];
        $html = str_replace($replacements, '', $this->oProcessor->getHtml());
        $this->oProcessor->setHtml($html);
    }
    public function addCustomCss(): void
    {
        $css = '';
        $mobileCss = $this->params->get('mobile_css', '');
        $desktopCss = $this->params->get('desktop_css', '');
        if (!empty($mobileCss)) {
            $css .= <<<CSS

@media (max-width: 767.98px) {
    {$mobileCss}
}

CSS;
        }
        if (!empty($desktopCss)) {
            $css .= <<<CSS

@media (min-width: 768px) {
    {$desktopCss}
}

CSS;
        }
        if ($css !== '') {
            $style = \JchOptimize\Core\Html\HtmlElementBuilder::style()->id('jch-optimize-custom-css')->addChild($css)->render();
            $this->appendChildToHead($style);
        }
    }
    protected function getAsyncManager(): \JchOptimize\Core\Html\AsyncManager
    {
        if ($this->asyncManager instanceof \JchOptimize\Core\Html\AsyncManager) {
            return $this->asyncManager;
        }
        throw new Exception\PropertyNotFoundException('AsyncManager not set in ' . get_class($this));
    }
}
