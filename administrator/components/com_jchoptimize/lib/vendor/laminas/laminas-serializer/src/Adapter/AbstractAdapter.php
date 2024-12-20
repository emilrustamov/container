<?php

/**
 * @see https://github.com/laminas/laminas-serializer for the canonical source repository
 */

declare(strict_types=1);

namespace _JchOptimizeVendor\Laminas\Serializer\Adapter;

use Traversable;

abstract class AbstractAdapter implements AdapterInterface
{
    /** @var AdapterOptions */
    protected $options;
    /**
     * Constructor
     *
     * @param array|Traversable|AdapterOptions $options
     */
    public function __construct($options = null)
    {
        if ($options !== null) {
            $this->setOptions($options);
        }
    }
    /**
     * Set adapter options
     *
     * @param array|Traversable|AdapterOptions $options
     * @return AbstractAdapter
     */
    public function setOptions($options)
    {
        if (!$options instanceof AdapterOptions) {
            $options = new AdapterOptions($options);
        }
        $this->options = $options;
        return $this;
    }
    /**
     * Get adapter options
     *
     * @return AdapterOptions
     */
    public function getOptions()
    {
        if ($this->options === null) {
            $this->options = new AdapterOptions();
        }
        return $this->options;
    }
}
