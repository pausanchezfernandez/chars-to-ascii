<?php

namespace Tests;

use Hamcrest\Core\IsEqual;
use Mockery;
use PHPUnit\Framework\TestCase;

class AsciiTestCase extends TestCase
{

    function tearDown()
    {
        parent::tearDown();

        if ($container = Mockery::getContainer()) {
            $this->addToAssertionCount($container->mockery_getExpectationCount());
        }


        Mockery::close();
    }
}