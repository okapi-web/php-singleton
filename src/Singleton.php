<?php

namespace Okapi\Singleton;

use Okapi\Singleton\Exceptions\AlreadyInitializedException;
use Okapi\Singleton\Exceptions\NotInitializedException;

/**
 * # Singleton trait
 *
 * A singleton class is a class that can have only one object (an instance of the class) at a time.
 */
trait Singleton
{
    /**
     * Singleton instance.
     *
     * @var self|null
     * @noinspection PhpDocFieldTypeMismatchInspection
     */
    private static ?self $instance = null;

    /**
     * Whether the instance has been initialized.
     *
     * @var bool
     */
    private bool $initialized = false;

    /**
     * Private constructor to prevent creating a new instance of the {@link Singleton} via the
     * {@link https://www.php.net/manual/language.oop5.basic.php#language.oop5.basic.new new} operator from
     * outside of this class.
     */
    private function __construct() {}

    /**
     * Get the singleton instance.
     *
     * @return static
     */
    public static function getInstance(): static
    {
        if (!isset(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Whether the instance has been initialized.
     *
     * @return bool
     */
    public static function isInitialized(): bool
    {
        return static::getInstance()->initialized;
    }

    /**
     * Set the instance as initialized.
     *
     * @return void
     */
    protected function setInitialized(): void
    {
        $this->initialized = true;
    }

    /**
     * Make sure that the instance has not been initialized yet.
     *
     * @return void
     */
    protected function ensureNotInitialized(): void
    {
        if (static::isInitialized()) {
            throw new AlreadyInitializedException(get_called_class());
        }
    }

    /**
     * Make sure that the instance has been initialized.
     *
     * @return void
     */
    protected function ensureInitialized(): void
    {
        if (!static::isInitialized()) {
            throw new NotInitializedException(get_called_class());
        }
    }
}
