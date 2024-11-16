<?php

/**
 * JCH Optimize - Performs several front-end optimizations for fast downloads
 *
 * @package   jchoptimize/core
 * @author    Samuel Marshall <samuel@jch-optimize.net>
 * @copyright Copyright (c) 2023 Samuel Marshall / JCH Optimize
 * @license   GNU/GPLv3, or later. See LICENSE file
 *
 *  If LICENSE file missing, see <http://www.gnu.org/licenses/>.
 */

namespace JchOptimize\Core\FeatureHelpers;

use JchOptimize\Core\Admin\Helper;
use JchOptimize\Core\Html\Elements\Img;
use JchOptimize\Core\Html\HtmlElementInterface;
use JchOptimize\Core\Uri\UriConverter;
use JchOptimize\Platform\Paths;
use _JchOptimizeVendor\Psr\Http\Message\UriInterface;

use function array_map;
use function file_exists;
use function implode;
use function pathinfo;

class ResponsiveImages extends \JchOptimize\Core\FeatureHelpers\AbstractFeatureHelper
{
    public static array $breakpoints = ['576', '768'];
    public function convert(HtmlElementInterface $element): void
    {
        if (!$element instanceof Img) {
            return;
        }
        /** @var string $width */
        $width = ($element->getWidth() ?: $element->attributeValue('data-width')) ?: 0;
        if ($element->getSrc() instanceof UriInterface && (int) $width > 1 && !$element->hasAttribute('srcset')) {
            $this->makeResponsiveImages($element);
        }
    }
    private function makeResponsiveImages(Img $element): void
    {
        $srcsetString = $this->createSrcsetString($element);
        if ($srcsetString) {
            $element->srcset($srcsetString);
            $element->sizes("(min-resolution: 3dppx) 25vw, (min-resolution: 2dppx) 30vw, (min-resolution: 1dppx) 50vw, 100vw");
        }
    }
    private function createSrcsetString(Img $element): string
    {
        $rsImages = $this->getResponsiveImages($element->getSrc());
        $srcset = array_map(fn(string $breakpoint, string $image): string => $image . ' ' . $breakpoint . 'w', \array_keys($rsImages), \array_values($rsImages));
        if (!empty($srcset)) {
            //If responsive images found we add the original as fallback
            $src = $element->getSrc();
            $width = $element->getWidth() ?: $element->attributeValue('data-width');
            $srcset[] = $src . ' ' . $width . 'w';
        }
        return implode(', ', $srcset);
    }
    public function getResponsiveImages(UriInterface $image): array
    {
        $imagePath = $this->getResponseImagePath($image);
        $rsImages = [];
        foreach (self::$breakpoints as $breakpoint) {
            $rsImagePath = '/' . $breakpoint . '/' . $imagePath;
            $potentialPaths = [];
            if ($this->params->get('pro_load_webp_images', '0')) {
                $fileParts = pathinfo($rsImagePath);
                $potentialPaths[] = $fileParts['dirname'] . '/' . $fileParts['filename'] . '.webp';
            }
            $potentialPaths[] = $rsImagePath;
            foreach ($potentialPaths as $potentialPath) {
                if (file_exists(Paths::responsiveImagePath() . $potentialPath)) {
                    $rsImages[$breakpoint] = Paths::responsiveImagePath(\true) . $potentialPath;
                    break;
                }
            }
        }
        return $rsImages;
    }
    private function getResponseImagePath(UriInterface $image): string
    {
        $imagePath = Helper::contractFileName(UriConverter::uriToFilePath($image));
        return \rawurldecode($imagePath);
    }
}
