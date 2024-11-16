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

namespace JchOptimize\Core\Html\Elements;

use JchOptimize\ContainerFactory;
use JchOptimize\Core\Helper;
use JchOptimize\Core\Html\Attribute;
use JchOptimize\Core\Html\AttributesCollection;
use JchOptimize\Core\Html\HtmlElementBuilder;
use JchOptimize\Core\Html\HtmlElementInterface;
use JchOptimize\Core\Html\Processor;
use _JchOptimizeVendor\Psr\Http\Message\UriInterface;

use function array_merge;
use function strtolower;

/**
 * @method BaseElement id(string $value)
 * @method BaseElement class(string $value)
 * @method BaseElement hidden(string $value)
 * @method BaseElement style(string $value)
 * @method BaseElement title(string $value)
 * @method string|bool getId()
 * @method array|bool getClass()
 * @method string|bool getHidden()
 * @method string|bool getStyle()
 * @method string|bool getTitle()
 */
class BaseElement implements HtmlElementInterface
{
    protected AttributesCollection $attributes;
    protected string $name = '';
    protected bool $isXhtml;
    /**
     * @var (HtmlElementInterface|string)[]
     */
    protected array $children = [];
    protected bool $omitClosingTag = \false;
    public function __construct()
    {
        $container = ContainerFactory::getContainer();
        $processor = $container->get(Processor::class);
        $this->isXhtml = Helper::isXhtml($processor->getHtml());
        $this->attributes = new AttributesCollection($this->isXhtml);
    }
    public function render(): string
    {
        $html = "<{$this->name}";
        $html .= $this->attributes->render();
        $html .= $this->isVoidElement($this->name) && $this->isXhtml ? ' />' : '>';
        if (!$this->isVoidElement($this->name) && !$this->omitClosingTag) {
            $html .= "{$this->renderChildren()}</{$this->name}>";
        }
        return $html;
    }
    public function attribute(string $name, string|array|UriInterface|bool $value = '', ?string $delimiter = null): static
    {
        $this->attributes->setAttribute($name, $value, $delimiter);
        return $this;
    }
    public function remove(string $name): static
    {
        $this->attributes->removeAttribute($name);
        return $this;
    }
    public function attributes(array $attributes): static
    {
        $this->attributes->setAttributes($attributes);
        return $this;
    }
    /**
     * @param string $name
     * @param array $arguments
     * @return static|array|bool|string|UriInterface
     */
    public function __call(string $name, array $arguments)
    {
        if (\str_starts_with($name, 'get')) {
            $name = strtolower(\substr($name, 3));
            return $this->attributeValue($name);
        }
        $value = $arguments[0] ?? '';
        $delimiter = $arguments[1] ?? null;
        return $this->attribute($name, $value, $delimiter);
    }
    public function data(string $name, UriInterface|array|string $value = ''): static
    {
        $this->attribute('data-' . $name, $value);
        return $this;
    }
    public function addChild(HtmlElementInterface|string $child): static
    {
        $this->children[] = $child;
        return $this;
    }
    public function addChildren(array $children): static
    {
        $this->children = array_merge($this->children, $children);
        return $this;
    }
    public function setName(string $name): static
    {
        $this->name = $name;
        return $this;
    }
    public function attributeValue(string $name): UriInterface|bool|array|string
    {
        if ($this->attributes->has($name)) {
            return $this->attributes->getValue($name);
        }
        return \false;
    }
    public function hasAttribute(string $name): bool
    {
        return $this->attributes->has($name);
    }
    public function firstOfAttributes(array $attributes): UriInterface|bool|array|string
    {
        foreach ($attributes as $name => $value) {
            if ($this->attributes->has($name)) {
                if ($this->attributes->isBoolean($name)) {
                    return $name;
                } elseif ($this->attributeValue($name) == $value) {
                    return $value;
                }
            }
        }
        return \false;
    }
    private function renderChildren(): string
    {
        $contents = '';
        foreach ($this->children as $child) {
            if ($child instanceof HtmlElementInterface) {
                $contents .= $child->render();
            } else {
                $contents .= $child;
            }
        }
        return $contents;
    }
    public function isVoidElement(string $name): bool
    {
        return \in_array($name, HtmlElementBuilder::$voidElements);
    }
    public function getChildren(): array
    {
        return $this->children;
    }
    /**
     * @param int $index
     * @param HtmlElementInterface|string $child
     * @return static
     */
    public function replaceChild(int $index, $child): static
    {
        $this->children[$index] = $child;
        return $this;
    }
    public function hasChildren(): bool
    {
        return !empty($this->children);
    }
    public function __toString(): string
    {
        return $this->render();
    }
    public function setOmitClosingTag(bool $flag): static
    {
        $this->omitClosingTag = $flag;
        return $this;
    }
}
