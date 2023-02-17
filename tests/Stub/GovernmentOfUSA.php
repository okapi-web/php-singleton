<?php

namespace Okapi\Singleton\Tests\Stub;

use Okapi\Singleton\Singleton;

class GovernmentOfUSA
{
    use Singleton;

    public static function register(): void
    {
        $instance = self::getInstance();

        $instance->ensureNotAlreadyInitialized();

        $instance->setInitialized();
    }

    public static function takeOverTheWorld(): void
    {
        $instance = self::getInstance();

        $instance->ensureAlreadyInitialized();
    }
}
