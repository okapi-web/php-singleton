<?php

namespace Okapi\Singleton\Exceptions;

use RuntimeException;

/**
 * # Not Initialized Exception
 *
 * This exception is thrown when a singleton is not initialized.
 */
class NotInitializedException extends RuntimeException
{
    /**
     * NotInitializedException constructor.
     *
     * @param string $className
     */
    public function __construct(string $className)
    {
        parent::__construct("Cannot use $className because it has not been initialized.");
    }
}
