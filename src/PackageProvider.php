<?php

namespace Ci\Jobs;

use Ci\Jobs\Permissions\RatingContextPermissions;
use Illuminate\Support\Facades\Event;
use Spatie\LaravelPackageTools\Package;
use Stem\Core\Contracts\Support\BasePackageProvider;

class PackageProvider extends BasePackageProvider
{
    public const CONNECTION = 'reviews';

    protected array $permissions = [
        RatingContextPermissions::class,
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('ci-jobs')
            ->hasMigrations()
            ->runsMigrations();
    }

}
