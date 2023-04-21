<?php

namespace Ci\Jobs\Tests;

use Ci\Jobs\PackageProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Stem\DevelopmentStandards\Base\TestCase;

abstract class BaseTestCase extends TestCase
{
    use RefreshDatabase;

    protected function getPackageProviders($app): array
    {
        return [
            PackageProvider::class,
            \Cviebrock\EloquentSluggable\ServiceProvider::class,

        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', PackageProvider::CONNECTION);
    }
}
