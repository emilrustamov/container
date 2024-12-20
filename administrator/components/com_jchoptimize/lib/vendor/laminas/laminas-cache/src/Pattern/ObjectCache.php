<?php

namespace _JchOptimizeVendor\Laminas\Cache\Pattern;

use _JchOptimizeVendor\Laminas\Cache\Exception;

use function array_shift;
use function array_unshift;
use function func_get_args;
use function in_array;
use function md5;
use function method_exists;
use function property_exists;
use function strtolower;

class ObjectCache extends CallbackCache
{
    /**
     * @return ObjectCache
     */
    public function setOptions(PatternOptions $options)
    {
        parent::setOptions($options);
        if (!$options->getObject()) {
            throw new Exception\InvalidArgumentException("Missing option 'object'");
        }
        return $this;
    }
    /**
     * Call and cache a class method
     *
     * @param  string $method  Method name to call
     * @param  array  $args    Method arguments
     * @return mixed
     * @throws Exception\RuntimeException
     * @throws \Exception
     */
    public function call($method, array $args = [])
    {
        $options = $this->getOptions();
        $object = $options->getObject();
        $method = strtolower($method);
        // handle magic methods
        switch ($method) {
            case '__set':
                $property = array_shift($args);
                $value = array_shift($args);
                $object->{$property} = $value;
                if (!$options->getObjectCacheMagicProperties() || property_exists($object, $property)) {
                    // no caching if property isn't magic
                    // or caching magic properties is disabled
                    return;
                }
                // remove cached __get and __isset
                $removeKeys = null;
                if (method_exists($object, '__get')) {
                    $removeKeys[] = $this->generateKey('__get', [$property]);
                }
                if (method_exists($object, '__isset')) {
                    $removeKeys[] = $this->generateKey('__isset', [$property]);
                }
                if ($removeKeys) {
                    $storage = $this->getStorage();
                    $storage->removeItems($removeKeys);
                }
                return;
            case '__get':
                $property = array_shift($args);
                if (!$options->getObjectCacheMagicProperties() || property_exists($object, $property)) {
                    // no caching if property isn't magic
                    // or caching magic properties is disabled
                    return $object->{$property};
                }
                array_unshift($args, $property);
                return parent::call([$object, '__get'], $args);
            case '__isset':
                $property = array_shift($args);
                if (!$options->getObjectCacheMagicProperties() || property_exists($object, $property)) {
                    // no caching if property isn't magic
                    // or caching magic properties is disabled
                    return isset($object->{$property});
                }
                return parent::call([$object, '__isset'], [$property]);
            case '__unset':
                $property = array_shift($args);
                unset($object->{$property});
                if (!$options->getObjectCacheMagicProperties() || property_exists($object, $property)) {
                    // no caching if property isn't magic
                    // or caching magic properties is disabled
                    return;
                }
                // remove previous cached __get and __isset calls
                $removeKeys = null;
                if (method_exists($object, '__get')) {
                    $removeKeys[] = $this->generateKey('__get', [$property]);
                }
                if (method_exists($object, '__isset')) {
                    $removeKeys[] = $this->generateKey('__isset', [$property]);
                }
                if ($removeKeys) {
                    $storage = $this->getStorage();
                    $storage->removeItems($removeKeys);
                }
                return;
        }
        $cache = $options->getCacheByDefault();
        if ($cache) {
            $cache = !in_array($method, $options->getObjectNonCacheMethods());
        } else {
            $cache = in_array($method, $options->getObjectCacheMethods());
        }
        if (!$cache) {
            return $object->{$method}(...$args);
        }
        return parent::call([$object, $method], $args);
    }
    /**
     * Generate a unique key in base of a key representing the callback part
     * and a key representing the arguments part.
     *
     * @param  string     $method  The method
     * @param  array      $args    Callback arguments
     * @return string
     * @throws Exception\RuntimeException
     */
    public function generateKey($method, array $args = [])
    {
        return $this->generateCallbackKey([$this->getOptions()->getObject(), $method], $args);
    }
    /**
     * Generate a unique key in base of a key representing the callback part
     * and a key representing the arguments part.
     *
     * @param  callable   $callback  A valid callback
     * @param  array      $args      Callback arguments
     * @return string
     * @throws Exception\RuntimeException
     */
    protected function generateCallbackKey($callback, array $args = [])
    {
        $callbackKey = md5($this->getOptions()->getObjectKey() . '::' . strtolower($callback[1]));
        $argumentKey = $this->generateArgumentsKey($args);
        return $callbackKey . $argumentKey;
    }
    /**
     * Class method call handler
     *
     * @param  string $method  Method name to call
     * @param  array  $args    Method arguments
     * @return mixed
     * @throws Exception\RuntimeException
     * @throws \Exception
     */
    public function __call($method, array $args)
    {
        return $this->call($method, $args);
    }
    /**
     * Writing data to properties.
     *
     * NOTE:
     * Magic properties will be cached too if the option cacheMagicProperties
     * is enabled and the property doesn't exist in real. If so it calls __set
     * and removes cached data of previous __get and __isset calls.
     *
     * @see    http://php.net/manual/language.oop5.overloading.php#language.oop5.overloading.members
     *
     * @phpcs:disable Squiz.Commenting.FunctionComment.InvalidReturnVoid
     *
     * @param  string $name
     * @param  mixed  $value
     * @return void
     */
    public function __set($name, $value)
    {
        return $this->call('__set', [$name, $value]);
    }
    /**
     * Reading data from properties.
     *
     * NOTE:
     * Magic properties will be cached too if the option cacheMagicProperties
     * is enabled and the property doesn't exist in real. If so it calls __get.
     *
     * @see http://php.net/manual/language.oop5.overloading.php#language.oop5.overloading.members
     *
     * @param  string $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->call('__get', [$name]);
    }
    /**
     * Checking existing properties.
     *
     * NOTE:
     * Magic properties will be cached too if the option cacheMagicProperties
     * is enabled and the property doesn't exist in real. If so it calls __get.
     *
     * @see    http://php.net/manual/language.oop5.overloading.php#language.oop5.overloading.members
     *
     * @param  string $name
     * @return bool
     */
    public function __isset($name)
    {
        return $this->call('__isset', [$name]);
    }
    /**
     * Unseting a property.
     *
     * NOTE:
     * Magic properties will be cached too if the option cacheMagicProperties
     * is enabled and the property doesn't exist in real. If so it removes
     * previous cached __isset and __get calls.
     *
     * @see    http://php.net/manual/language.oop5.overloading.php#language.oop5.overloading.members
     *
     * @phpcs:disable Squiz.Commenting.FunctionComment.InvalidReturnVoid
     *
     * @param  string $name
     *
     * @return void
     */
    public function __unset($name)
    {
        return $this->call('__unset', [$name]);
    }
    /**
     * Handle casting to string
     *
     * @see    http://php.net/manual/language.oop5.magic.php#language.oop5.magic.tostring
     *
     * @return string
     */
    public function __toString()
    {
        return $this->call('__toString');
    }
    /**
     * Handle invoke calls
     *
     * @see    http://php.net/manual/language.oop5.magic.php#language.oop5.magic.invoke
     *
     * @return mixed
     */
    public function __invoke()
    {
        return $this->call('__invoke', func_get_args());
    }
}
