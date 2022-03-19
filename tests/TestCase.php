<?php

namespace Tests;

use IFresh\Collection\CollectionServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            CollectionServiceProvider::class,
        ];
    }
}