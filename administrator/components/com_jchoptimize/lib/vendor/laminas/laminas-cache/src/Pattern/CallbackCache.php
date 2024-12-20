<?php

namespace _JchOptimizeVendor\Laminas\Cache\Pattern;

use _JchOptimizeVendor\Laminas\Cache\Exception;
use _JchOptimizeVendor\Laminas\Stdlib\ErrorHandler;

use function array_key_exists;
use function array_values;
use function is_callable;
use function is_object;
use function md5;
use function ob_end_flush;
use function ob_get_flush;
use function ob_implicit_flush;
use function ob_start;
use function serialize;
use function sprintf;
use function strtolower;

class CallbackCache extends AbstractStorageCapablePattern
{
    /**
     * Call the specified callback or get the result from cache
     *
     * @param  callable   $callback  A valid callback
     * @param  array      $args      Callback arguments
     * @return mixed Result
     * @throws Exception\RuntimeException If invalid cached data.
     * @throws \Exception
     */
    public function call($callback, array $args = [])
    {
        $options = $this->getOptions();
        $storage = $this->getStorage();
        $success = null;
        $key = $this->generateCallbackKey($callback, $args);
        $result = $storage->getItem($key, $success);
        if ($success) {
            if (!array_key_exists(0, $result)) {
                throw new Exception\RuntimeException("Invalid cached data for key '{$key}'");
            }
            echo $result[1] ?? '';
            return $result[0];
        }
        $cacheOutput = $options->getCacheOutput();
        if ($cacheOutput) {
            ob_start();
            ob_implicit_flush(0);
        }
        // TODO: do not cache on errors using [set|restore]_error_handler
        try {
            $ret = $callback(...$args);
        } catch (\Exception $e) {
            if ($cacheOutput) {
                ob_end_flush();
            }
            throw $e;
        }
        if ($cacheOutput) {
            $data = [$ret, ob_get_flush()];
        } else {
            $data = [$ret];
        }
        $storage->setItem($key, $data);
        return $ret;
    }
    /**
     * function call handler
     *
     * @param  string $function  Function name to call
     * @param  array  $args      Function arguments
     * @return mixed
     * @throws Exception\RuntimeException
     * @throws \Exception
     */
    public function __call($function, array $args)
    {
        return $this->call($function, $args);
    }
    /**
     * Generate a unique key in base of a key representing the callback part
     * and a key representing the arguments part.
     *
     * @param  callable   $callback  A valid callback
     * @param  array      $args      Callback arguments
     * @return string
     * @throws Exception\RuntimeException
     * @throws Exception\InvalidArgumentException
     */
    public function generateKey($callback, array $args = [])
    {
        return $this->generateCallbackKey($callback, $args);
    }
    /**
     * Generate a unique key in base of a key representing the callback part
     * and a key representing the arguments part.
     *
     * @param  callable   $callback  A valid callback
     * @param  array      $args      Callback arguments
     * @throws Exception\RuntimeException If callback not serializable.
     * @throws Exception\InvalidArgumentException If invalid callback.
     * @return string
     */
    protected function generateCallbackKey($callback, array $args)
    {
        if (!is_callable($callback, \false, $callbackKey)) {
            throw new Exception\InvalidArgumentException('Invalid callback');
        }
        // functions, methods and classnames are case-insensitive
        $callbackKey = strtolower($callbackKey);
        // generate a unique key of object callbacks
        if (is_object($callback)) {
            // Closures & __invoke
            $object = $callback;
        } elseif (isset($callback[0])) {
            // array($object, 'method')
            $object = $callback[0];
        }
        if (isset($object)) {
            ErrorHandler::start();
            try {
                $serializedObject = serialize($object);
            } catch (\Exception $e) {
                ErrorHandler::stop();
                throw new Exception\RuntimeException("Can't serialize callback: see previous exception", 0, $e);
            }
            $error = ErrorHandler::stop();
            if (!$serializedObject) {
                throw new Exception\RuntimeException(sprintf('Cannot serialize callback%s', $error ? ': ' . $error->getMessage() : ''), 0, $error);
            }
            $callbackKey .= $serializedObject;
        }
        return md5($callbackKey) . $this->generateArgumentsKey($args);
    }
    /**
     * Generate a unique key of the argument part.
     *
     * @param  array $args
     * @throws Exception\RuntimeException
     * @return string
     */
    protected function generateArgumentsKey(array $args)
    {
        if (!$args) {
            return '';
        }
        ErrorHandler::start();
        try {
            $serializedArgs = serialize(array_values($args));
        } catch (\Exception $e) {
            ErrorHandler::stop();
            throw new Exception\RuntimeException("Can't serialize arguments: see previous exception", 0, $e);
        }
        $error = ErrorHandler::stop();
        if (!$serializedArgs) {
            throw new Exception\RuntimeException(sprintf('Cannot serialize arguments%s', $error ? ': ' . $error->getMessage() : ''), 0, $error);
        }
        return md5($serializedArgs);
    }
}
