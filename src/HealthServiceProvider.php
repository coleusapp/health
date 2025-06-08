<?php

namespace Coleus\Health;

use Coleus\Health\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('health')
            ->hasRoute('web');
    }
}
