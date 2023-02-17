<?php

namespace Okapi\Singleton\Tests;

use Okapi\Singleton\Exceptions\AlreadyInitializedException;
use Okapi\Singleton\Exceptions\NotInitializedException;
use Okapi\Singleton\Tests\Stub\GovernmentOfUSA;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testEnsureAlreadyInitializedException(): void
    {
        $this->expectException(NotInitializedException::class);

        GovernmentOfUSA::takeOverTheWorld();
    }

    public function testIsInitialized(): void
    {
        $initialized = GovernmentOfUSA::isInitialized();
        $this->assertFalse($initialized);

        $government = GovernmentOfUSA::getInstance();
        $this->assertInstanceOf(GovernmentOfUSA::class, $government);

        // Should be false, because the instance should initialize itself
        $initialized = GovernmentOfUSA::isInitialized();
        $this->assertFalse($initialized);

        GovernmentOfUSA::register();
        $initialized = GovernmentOfUSA::isInitialized();
        $this->assertTrue($initialized);
    }

    public function testEnsureNotAlreadyInitialized(): void
    {
        $this->expectException(AlreadyInitializedException::class);

        GovernmentOfUSA::register();
    }

    public function testEnsureAlreadyInitialized(): void
    {
        GovernmentOfUSA::takeOverTheWorld();

        $this->expectNotToPerformAssertions();
    }
}
