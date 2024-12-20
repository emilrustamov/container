<?php

namespace _JchOptimizeVendor\Laminas\Paginator;

use _JchOptimizeVendor\Laminas\ServiceManager\AbstractPluginManager;
use _JchOptimizeVendor\Laminas\ServiceManager\Exception\InvalidServiceException;
use _JchOptimizeVendor\Laminas\ServiceManager\Factory\InvokableFactory;
use _JchOptimizeVendor\Zend\Paginator\Adapter\ArrayAdapter;
use _JchOptimizeVendor\Zend\Paginator\Adapter\Callback;
use _JchOptimizeVendor\Zend\Paginator\Adapter\DbSelect;
use _JchOptimizeVendor\Zend\Paginator\Adapter\DbTableGateway;
use _JchOptimizeVendor\Zend\Paginator\Adapter\Iterator;
use _JchOptimizeVendor\Zend\Paginator\Adapter\NullFill;

use function get_class;
use function gettype;
use function is_object;
use function sprintf;

/**
 * Plugin manager implementation for paginator adapters.
 *
 * Enforces that adapters retrieved are instances of
 * Adapter\AdapterInterface. Additionally, it registers a number of default
 * adapters available.
 */
class AdapterPluginManager extends AbstractPluginManager
{
    /**
     * Default aliases
     *
     * Primarily for ensuring previously defined adapters select their
     * current counterparts.
     *
     * @var array
     */
    protected $aliases = [
        'callback' => Adapter\Callback::class,
        'Callback' => Adapter\Callback::class,
        'dbselect' => Adapter\DbSelect::class,
        'dbSelect' => Adapter\DbSelect::class,
        'DbSelect' => Adapter\DbSelect::class,
        'dbtablegateway' => Adapter\DbTableGateway::class,
        'dbTableGateway' => Adapter\DbTableGateway::class,
        'DbTableGateway' => Adapter\DbTableGateway::class,
        'null' => Adapter\NullFill::class,
        'Null' => Adapter\NullFill::class,
        'nullfill' => Adapter\NullFill::class,
        'nullFill' => Adapter\NullFill::class,
        'NullFill' => Adapter\NullFill::class,
        'array' => Adapter\ArrayAdapter::class,
        'Array' => Adapter\ArrayAdapter::class,
        'iterator' => Adapter\Iterator::class,
        'Iterator' => Adapter\Iterator::class,
        'laminaspaginatoradapternull' => Adapter\NullFill::class,
        // Legacy Zend Framework aliases
        Callback::class => Adapter\Callback::class,
        DbSelect::class => Adapter\DbSelect::class,
        DbTableGateway::class => Adapter\DbTableGateway::class,
        NullFill::class => Adapter\NullFill::class,
        Iterator::class => Adapter\Iterator::class,
        ArrayAdapter::class => Adapter\ArrayAdapter::class,
        'zendpaginatoradapternull' => Adapter\NullFill::class,
        // v2 normalized FQCNs
        'zendpaginatoradaptercallback' => Adapter\Callback::class,
        'zendpaginatoradapterdbselect' => Adapter\DbSelect::class,
        'zendpaginatoradapterdbtablegateway' => Adapter\DbTableGateway::class,
        'zendpaginatoradapternullfill' => Adapter\NullFill::class,
        'zendpaginatoradapteriterator' => Adapter\Iterator::class,
        'zendpaginatoradapterarrayadapter' => Adapter\ArrayAdapter::class,
    ];
    /**
     * Default set of adapter factories
     *
     * @var array
     */
    protected $factories = [
        Adapter\Callback::class => Adapter\Service\CallbackFactory::class,
        Adapter\DbSelect::class => Adapter\Service\DbSelectFactory::class,
        Adapter\DbTableGateway::class => Adapter\Service\DbTableGatewayFactory::class,
        Adapter\NullFill::class => InvokableFactory::class,
        Adapter\Iterator::class => Adapter\Service\IteratorFactory::class,
        Adapter\ArrayAdapter::class => InvokableFactory::class,
        // v2 normalized names
        'laminaspaginatoradaptercallback' => Adapter\Service\CallbackFactory::class,
        'laminaspaginatoradapterdbselect' => Adapter\Service\DbSelectFactory::class,
        'laminaspaginatoradapterdbtablegateway' => Adapter\Service\DbTableGatewayFactory::class,
        'laminaspaginatoradapternullfill' => InvokableFactory::class,
        'laminaspaginatoradapteriterator' => Adapter\Service\IteratorFactory::class,
        'laminaspaginatoradapterarrayadapter' => InvokableFactory::class,
    ];
    /** @var string */
    protected $instanceOf = Adapter\AdapterInterface::class;
    /**
     * Validate that a plugin is an adapter (v3)
     *
     * @param mixed $instance
     * @throws InvalidServiceException
     */
    public function validate($instance)
    {
        if (!$instance instanceof $this->instanceOf) {
            throw new InvalidServiceException(sprintf('Plugin of type %s is invalid; must implement %s', is_object($instance) ? get_class($instance) : gettype($instance), Adapter\AdapterInterface::class));
        }
    }
    /**
     * Validate that a plugin is an adapter (v2)
     *
     * @param mixed $plugin
     * @throws Exception\RuntimeException
     * @return void
     */
    public function validatePlugin($plugin)
    {
        try {
            $this->validate($plugin);
        } catch (InvalidServiceException $e) {
            throw new Exception\RuntimeException($e->getMessage(), $e->getCode(), $e);
        }
    }
}
