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

namespace JchOptimize\Core\Html\Callbacks;

use JchOptimize\Core\Css\Parser as CssParser;
use JchOptimize\Core\Css\Processor;
use JchOptimize\Core\Exception\PregErrorException;
use JchOptimize\Core\FeatureHelpers\LazyLoadExtended;
use JchOptimize\Core\FeatureHelpers\ResponsiveImages;
use JchOptimize\Core\FeatureHelpers\Webp;
use JchOptimize\Core\Helper;
use JchOptimize\Core\Html\Elements\Audio;
use JchOptimize\Core\Html\Elements\BaseElement;
use JchOptimize\Core\Html\Elements\Iframe;
use JchOptimize\Core\Html\Elements\Img;
use JchOptimize\Core\Html\Elements\Picture;
use JchOptimize\Core\Html\Elements\Source;
use JchOptimize\Core\Html\Elements\Style;
use JchOptimize\Core\Html\Elements\Video;
use JchOptimize\Core\Html\HtmlElementBuilder;
use JchOptimize\Core\Html\HtmlElementInterface;
use JchOptimize\Core\Http2Preload;
use JchOptimize\Core\Registry;
use JchOptimize\Core\Uri\Utils;
use Joomla\DI\Container;

use function array_merge;
use function base64_encode;
use function defined;
use function implode;
use function preg_match;

use const JCH_PRO;

defined('_JCH_EXEC') or die('Restricted access');
class LazyLoad extends \JchOptimize\Core\Html\Callbacks\AbstractCallback
{
    /**
     * @var Http2Preload
     */
    public Http2Preload $http2Preload;
    /**
     * @var array
     */
    protected array $excludes = [];
    /**
     * @var array
     */
    protected array $args = [];
    /**
     * @var int Width of <img> element inside <picture>
     */
    public int $width = 1;
    /**
     * @var int Height of <img> element inside picture
     */
    public int $height = 1;
    public function __construct(Container $container, Registry $params, Http2Preload $http2Preload)
    {
        parent::__construct($container, $params);
        $this->http2Preload = $http2Preload;
        $this->getLazyLoadExcludes();
    }
    protected function getLazyLoadExcludes(): void
    {
        $aExcludesFiles = Helper::getArray($this->params->get('excludeLazyLoad', []));
        $aExcludesFolders = Helper::getArray($this->params->get('pro_excludeLazyLoadFolders', []));
        $aExcludesUrl = array_merge(['data:image'], $aExcludesFiles, $aExcludesFolders);
        $aExcludeClass = Helper::getArray($this->params->get('pro_excludeLazyLoadClass', []));
        $this->excludes = ['url' => $aExcludesUrl, 'class' => $aExcludeClass];
    }
    /**
     * @inheritDoc
     */
    public function processMatches(array $matches): string
    {
        if (empty($matches[0]) || empty($matches[1])) {
            return $matches[0];
        }
        try {
            $element = HtmlElementBuilder::load($matches[0]);
        } catch (PregErrorException $e) {
            return $matches[0];
        }
        //If we're lazy-loading background images in a style that wasn't combined
        if ($element instanceof Style && JCH_PRO && ($this->params->get('pro_lazyload_bgimages', '0') || $this->params->get('pro_load_webp_images', '0'))) {
            /**
             * @var int $index
             * @var string $child
             */
            foreach ($element->getChildren() as $index => $child) {
                $cssProcessor = $this->getContainer()->get(Processor::class);
                $cssProcessor->setCss($child);
                $cssProcessor->processUrls();
                $element->replaceChild($index, $cssProcessor->getCss());
            }
            return $element->render();
        }
        if (JCH_PRO && $this->params->get('pro_load_responsive_images', '0')) {
            $this->loadResponsiveImages($element);
        }
        if (JCH_PRO && $this->params->get('pro_load_webp_images', '0')) {
            $this->loadWebpImages($element);
        }
        if (JCH_PRO && $this->params->get('pro_lcp_images_enable', '0')) {
            if ($this->lcpImageProcessed($element)) {
                return $element->render();
            }
        }
        $options = array_merge($this->args, ['parent' => '']);
        //LCP Images in style attributes are also processed here
        if ($this->elementExcluded($element)) {
            return $element->render();
        }
        if ($options['lazyload'] || $this->params->get('pro_http2_push_enable', '0')) {
            $element = $this->lazyLoadElement($element, $options);
        }
        return $element->render();
    }
    private function lazyLoadElement(BaseElement $element, array $options): BaseElement
    {
        if ($options['lazyload']) {
            //If no srcset attribute was found, modify the src attribute and add a data-src attribute
            if ($element instanceof Img && !$element->hasAttribute('srcset') || $element instanceof Iframe) {
                if (!empty($element->getSrc())) {
                    $width = $element->getWidth() ?: ($element->attributeValue('data-width') ?: '1');
                    $height = $element->getHeight() ?: ($element->attributeValue('data-height') ?: '1');
                    $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $width . '" height="' . $height . '"></svg>';
                    $sNewSrcValue = $element instanceof Iframe ? 'about:blank' : 'data:image/svg+xml;base64,' . base64_encode($svg);
                    if ($element instanceof Img && $element->hasAttribute('loading')) {
                        $element->loading('lazy');
                    }
                    $element->data('src', (string) $element->getSrc());
                    $element->src($sNewSrcValue);
                    $element->class('jch-lazyload');
                }
            }
            //Modern browsers will lazy-load without loading the src attribute
            if (($element instanceof Img || $element instanceof Source && $options['parent'] instanceof Picture) && $element->hasAttribute('srcset')) {
                if (!empty($element->getSrcset())) {
                    $width = $element->getWidth() ?: ($element->attributeValue('data-width') ?: $options['width'] ?? '1');
                    $height = $element->getHeight() ?: ($element->attributeValue('data-height') ?: $options['height'] ?? '1');
                    $sSvgSrcset = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $width . '" height="' . $height . '"></svg>';
                    $element->data('srcset', $element->getSrcset());
                    $element->srcset('data:image/svg+xml;base64,' . base64_encode($sSvgSrcset));
                    if ($element instanceof Img) {
                        if ($element->hasAttribute('loading')) {
                            $element->loading('lazy');
                        }
                        $element->class('jch-lazyload');
                    }
                }
            }
            if (JCH_PRO && ($element instanceof Audio || $element instanceof Video)) {
                /** @see LazyLoadExtended::lazyLoadAudioVideo() */
                $this->getContainer()->get(LazyLoadExtended::class)->lazyLoadAudioVideo($element);
            }
            if ($element instanceof Picture && $element->hasChildren()) {
                $this->lazyLoadChildren($element);
            }
            if ($options['parent'] !== '') {
                return $element;
            }
            if (JCH_PRO && $this->params->get('pro_lazyload_bgimages', '0')) {
                /** @see LazyLoadExtended::lazyLoadBgImages() */
                $this->getContainer()->get(LazyLoadExtended::class)->lazyLoadBgImages($element);
            }
        } else {
            if ($element->hasAttribute('style')) {
                preg_match('#' . CssParser::cssUrlWithCaptureValueToken(\true) . '#i', $element->getStyle(), $match);
                if (!empty($match[1])) {
                    $this->http2Preload->add(Utils::uriFor($match[1]), 'image');
                }
            }
            //If lazy-load enabled, remove loading="lazy" attributes from above the fold
            if ($this->params->get('lazyload_enable', '0') && !$options['deferred'] && $element instanceof Img) {
                //Remove any lazy loading
                if ($element->hasAttribute('loading')) {
                    $element->loading('eager');
                }
            }
        }
        return $element;
    }
    protected function lazyLoadChildren($element): void
    {
        $options = $this->args;
        foreach ($element->getChildren() as $child) {
            if ($child instanceof Img) {
                if ($child->hasAttribute('data-width')) {
                    $options['width'] = $child->attributeValue('data-width');
                }
                if ($child->hasAttribute('width')) {
                    $options['width'] = $child->getWidth();
                }
                if ($child->hasAttribute('data-height')) {
                    $options['height'] = $child->attributeValue('data-height');
                }
                if ($child->hasAttribute('height')) {
                    $options['height'] = $child->getHeight();
                }
            }
        }
        if (empty($options['parent'])) {
            $options['parent'] = $element;
        }
        //Process and add content of element if not self-closing
        foreach ($element->getChildren() as $index => $child) {
            if ($child instanceof HtmlElementInterface) {
                $element->replaceChild($index, $this->lazyLoadElement($child, $options));
            }
        }
    }
    public function setLazyLoadArgs(array $args): void
    {
        $this->args = $args;
    }
    private function elementExcluded(HtmlElementInterface $element): bool
    {
        //Exclude based on class
        if ($element->hasAttribute('class')) {
            if (Helper::findExcludes($this->excludes['class'], implode(' ', $element->getClass()))) {
                //Remove any lazy loading from excluded images
                if ($element->hasAttribute('loading')) {
                    $element->attribute('loading', 'eager');
                }
                return \true;
            }
        }
        //If a src attribute is found
        if ($element->hasAttribute('src')) {
            //Abort if this file is excluded
            if (Helper::findExcludes($this->excludes['url'], (string) $element->attributeValue('src'))) {
                //Remove any lazy loading from excluded images
                if ($element->hasAttribute('loading')) {
                    $element->attribute('loading', 'eager');
                }
                return \true;
            }
        }
        //If poster attribute was found we can also exclude using poster value
        if (JCH_PRO && $element instanceof Video && $element->hasAttribute('poster')) {
            if (Helper::findExcludes($this->excludes['url'], $element->getPoster())) {
                return \true;
            }
        }
        if (JCH_PRO && $element->hasAttribute('style')) {
            preg_match('#' . CssParser::cssUrlWithCaptureValueToken(\true) . '#i', $element->getStyle(), $match);
            if (!empty($match[1])) {
                $image = $match[1];
                //We check first for LCP images
                if ($this->params->get('pro_lcp_images_enable', '0')) {
                    $lcpImages = Helper::getArray($this->params->get('pro_lcp_images', []));
                    if (Helper::findMatches($lcpImages, $image)) {
                        $this->http2Preload->preload(Utils::uriFor($match[1]), 'image', '', 'high');
                        return \true;
                    }
                }
                if (Helper::findExcludes($this->excludes['url'], $image)) {
                    return \true;
                }
            }
        }
        if ($element->hasChildren()) {
            foreach ($element->getChildren() as $child) {
                if ($child instanceof HtmlElementInterface && $this->elementExcluded($child)) {
                    return \true;
                }
            }
        }
        return \false;
    }
    private function loadWebpImages(HtmlElementInterface $element): void
    {
        if ($element->hasChildren()) {
            foreach ($element->getChildren() as $child) {
                if ($child instanceof HtmlElementInterface) {
                    $this->loadWebpImages($child);
                }
            }
        }
        $this->getContainer()->get(Webp::class)->convert($element);
    }
    private function loadResponsiveImages(HtmlElementInterface $element): void
    {
        if ($element->hasChildren()) {
            foreach ($element->getChildren() as $child) {
                if ($child instanceof HtmlElementInterface) {
                    $this->loadResponsiveImages($child);
                }
            }
        }
        $this->getContainer()->get(ResponsiveImages::class)->convert($element);
    }
    private function lcpImageProcessed(HtmlElementInterface $element): bool
    {
        $lcpImages = Helper::getArray($this->params->get('pro_lcp_images'));
        if (empty($lcpImages)) {
            return \false;
        }
        if ($element->hasChildren()) {
            foreach ($element->getChildren() as $child) {
                if ($child instanceof Img) {
                    if ($this->lcpImageProcessed($child)) {
                        return \true;
                    }
                }
            }
        }
        if ($element instanceof Img) {
            if ($element->hasAttribute('srcset')) {
                $srcset = $element->getSrcset();
                $uris = Helper::extractUrlsFromSrcset($srcset);
                if (($src = $element->getSrc()) !== \false) {
                    $uris = array_merge($uris, [$src]);
                }
                foreach ($uris as $uri) {
                    if (Helper::findMatches($lcpImages, $uri)) {
                        $element->fetchpriority('high');
                        if ($element->hasAttribute('loading')) {
                            $element->loading('eager');
                        }
                        return \true;
                    }
                }
            } else {
                if (($src = $element->getSrc()) !== \false && Helper::findMatches($lcpImages, $src)) {
                    $this->http2Preload->preload($src, 'image', '', 'high');
                    if ($element->hasAttribute('loading')) {
                        $element->loading('eager');
                    }
                    return \true;
                }
            }
        }
        return \false;
    }
}
