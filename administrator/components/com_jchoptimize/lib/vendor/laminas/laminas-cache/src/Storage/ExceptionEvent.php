<?php

namespace _JchOptimizeVendor\Laminas\Cache\Storage;

use ArrayObject;
use Exception;

class ExceptionEvent extends PostEvent
{
    /**
     * The exception to be thrown
     *
     * @var Exception
     */
    protected $exception;
    /**
     * Throw the exception or use the result
     *
     * @var bool
     */
    protected $throwException = \true;
    /**
     * Constructor
     *
     * Accept a target and its parameters.
     *
     * @param  string $name
     * @param  mixed $result
     */
    public function __construct($name, StorageInterface $storage, ArrayObject $params, &$result, Exception $exception)
    {
        parent::__construct($name, $storage, $params, $result);
        $this->setException($exception);
    }
    /**
     * Set the exception to be thrown
     *
     * @return ExceptionEvent
     */
    public function setException(Exception $exception)
    {
        $this->exception = $exception;
        return $this;
    }
    /**
     * Get the exception to be thrown
     *
     * @return Exception
     */
    public function getException()
    {
        return $this->exception;
    }
    /**
     * Throw the exception or use the result
     *
     * @param  bool $flag
     * @return ExceptionEvent
     */
    public function setThrowException($flag)
    {
        $this->throwException = (bool) $flag;
        return $this;
    }
    /**
     * Throw the exception or use the result
     *
     * @return bool
     */
    public function getThrowException()
    {
        return $this->throwException;
    }
}
