<?php

namespace Okapi\Singleton\Exceptions;

/**
 * # Already Initialized Exception
 *
 * This exception is thrown when a singleton instance is already initialized.
 */
class AlreadyInitializedException extends SingletonException
{
    /**
     * AlreadyInitializedException constructor.
     *
     * @param string $className
     */
    public function __construct(string $className)
    {
        parent::__construct("The singleton instance of $className has already been initialized.");
    }
}
