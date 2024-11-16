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

namespace JchOptimize\Core\Css\Callbacks;

use _JchOptimizeVendor\GuzzleHttp\Psr7\Uri;
use _JchOptimizeVendor\GuzzleHttp\Psr7\UriResolver;
use JchOptimize\Core\Cdn;
use JchOptimize\Core\Css\Parser;
use JchOptimize\Core\FeatureHelpers\LazyLoadExtended;
use JchOptimize\Core\FeatureHelpers\ResponsiveImages;
use JchOptimize\Core\FeatureHelpers\Webp;
use JchOptimize\Core\Helper;
use JchOptimize\Core\Http2Preload;
use JchOptimize\Core\Registry;
use JchOptimize\Core\SystemUri;
use JchOptimize\Core\Uri\UriComparator;
use JchOptimize\Core\Uri\Utils;
use JchOptimize\Platform\Utility;
use Joomla\DI\Container;

use function defined;
use function in_array;
use function preg_replace_callback;
use function str_replace;

defined('_JCH_EXEC') or die('Restricted access');
class CorrectUrls extends \JchOptimize\Core\Css\Callbacks\AbstractCallback
{
    /** @var bool True if this callback is called when preloading assets for HTTP/2 */
    public bool $isHttp2 = \false;
    /** @var Cdn */
    public Cdn $cdn;
    /** @var Http2Preload */
    public Http2Preload $http2Preload;
    /** @var array */
    private array $images = [];
    /** @var array An array of external domains that we'll add preconnects for */
    private array $preconnects = [];
    /** @var array */
    private array $cssInfos = [];
    private array $lcpImages = [];
    private array $responsiveImages = [];
    public array $cssBgImagesSelectors = [];
    public function __construct(Container $container, Registry $params, Cdn $cdn, Http2Preload $http2Preload)
    {
        parent::__construct($container, $params);
        $this->cdn = $cdn;
        $this->http2Preload = $http2Preload;
    }
    /**
     * @inheritDoc
     */
    public function processMatches(array $matches, string $context): string
    {
        $sRegex = '(?>u?[^u]*+)*?\\K(?:' . Parser::cssUrlWithCaptureValueToken(\true) . '|$)';
        if ($context == 'import') {
            $sRegex = Parser::cssAtImportWithCaptureValueToken(\true);
        }
        $css = preg_replace_callback('#' . $sRegex . '#i', function ($aInnerMatches) use ($context) {
            return $this->processInnerMatches($aInnerMatches, $context);
        }, $matches[0]);
        //Lazy-load background images
        if (JCH_PRO && $this->params->get('lazyload_enable', '0') && $this->params->get('pro_lazyload_bgimages', '0') && !in_array($context, ['font-face', 'import'])) {
            /** @see LazyLoadExtended::handleCssBgImages() */
            return $this->getContainer()->get(LazyLoadExtended::class)->handleCssBgImages($this, $css);
        }
        $rsCss = '';
        if (JCH_PRO && !empty($this->responsiveImages)) {
            foreach ($this->responsiveImages as $breakpoint => $rsImage) {
                $tmpCss = preg_replace_callback('#' . Parser::cssUrlWithCaptureValueToken(\true) . '#', fn($match) => str_replace($match[1], $rsImage, $match[0]), $css);
                $rsCss .= "@media (max-width: {$breakpoint}px){{$tmpCss}}";
            }
        }
        return $css . $rsCss;
    }
    /**
     * @param string[] $matches
     *
     * @psalm-param array<string> $matches
     */
    protected function processInnerMatches(array $matches, $context)
    {
        if (empty($matches[0])) {
            return $matches[0];
        }
        $originalUri = Utils::uriFor($matches[1]);
        if ($originalUri->getScheme() !== 'data' && $originalUri->getPath() != '' && $originalUri->getPath() != '/') {
            if ($this->isHttp2) {
                //The urls were already corrected on a previous run,
                // we're only preloading assets in critical CSS and return
                $fileType = $context == 'font-face' ? 'font' : 'image';
                //LCP Images would have already been processed, we can skip those
                if (JCH_PRO && $this->params->get('pro_lcp_images_enable')) {
                    $lcpImages = Helper::getArray($this->params->get('pro_lcp_images', []));
                    if (Helper::findMatches($lcpImages, $originalUri)) {
                        return \true;
                    }
                }
                $this->http2Preload->add($originalUri, $fileType);
                return \true;
            }
            //Get the url of the file that contained the CSS
            $cssFileUri = empty($this->cssInfos['url']) ? new Uri() : $this->cssInfos['url'];
            $cssFileUri = UriResolver::resolve(SystemUri::currentUri(), $cssFileUri);
            $imageUri = UriResolver::resolve($cssFileUri, $originalUri);
            if (!UriComparator::isCrossOrigin($imageUri)) {
                //Collect local images if running in admin. Used by Optimize Images and MultiSelect exclude
                if (Utility::isAdmin() && !in_array((string) $imageUri, $this->images) && $context != 'font-face') {
                    $this->images[] = $imageUri;
                }
                $imageUri = $this->cdn->loadCdnResource($imageUri);
            } elseif ($this->params->get('pro_preconnect_domains_enable', '0')) {
                //Cache external domains to add preconnects for them
                $domain = Uri::composeComponents($imageUri->getScheme(), $imageUri->getAuthority(), '', '', '');
                if (!in_array($domain, $this->preconnects)) {
                    $this->preconnects[] = $domain;
                }
            }
            if ($context != 'font-face' && $context != 'import') {
                if (JCH_PRO && $this->params->get('pro_load_responsive_images', '0')) {
                    /** @see ResponsiveImages::handleCssBgImages() */
                    $this->responsiveImages = \array_reverse($this->getContainer()->get(ResponsiveImages::class)->getResponsiveImages($imageUri), \true);
                }
                if (JCH_PRO && $this->params->get('pro_load_webp_images', '0')) {
                    /** @see Webp::getWebpImages() */
                    $imageUri = $this->getContainer()->get(Webp::class)->getWebpImages($imageUri);
                }
                if (JCH_PRO && $this->params->get('pro_lcp_images_enable')) {
                    $lcpImages = Helper::getArray($this->params->get('pro_lcp_images', []));
                    if (Helper::findMatches($lcpImages, $imageUri)) {
                        $this->lcpImages[] = $imageUri;
                    }
                }
            }
            // If URL without quotes and contains any parentheses, whitespace characters,
            // single quotes (') and double quotes (") that are part of the URL, quote URL
            if (\str_contains($matches[0], 'url(' . $originalUri . ')') && \preg_match('#[()\\s\'"]#', $imageUri)) {
                $imageUri = '"' . $imageUri . '"';
            }
            return str_replace($matches[1], $imageUri, $matches[0]);
        } else {
            return $matches[0];
        }
    }
    public function setCssInfos(array $cssInfos): void
    {
        $this->cssInfos = $cssInfos;
    }
    public function getImages(): array
    {
        return $this->images;
    }
    public function getLcpImages(): array
    {
        return $this->lcpImages;
    }
    public function getPreconnects(): array
    {
        return $this->preconnects;
    }
    public function getCssBgImagesSelectors(): array
    {
        return $this->cssBgImagesSelectors;
    }
}
