<?php

namespace Coleus\Health;

use Coleus\Health\Commands\HealthFreshCommand;
use Coleus\Health\Contracts\Distance;
use Coleus\Health\Contracts\Duration;
use Coleus\Health\Contracts\Weight;
use Coleus\Health\Http\Middleware\HandleInertiaRequests;
use Coleus\Health\Models\App as HealthApp;
use Coleus\Health\Services\Conversions\DistanceConversion;
use Coleus\Health\Services\Conversions\DurationConversion;
use Coleus\Health\Services\Conversions\WeightConversion;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('health')
            ->hasConfigFile()
            ->hasCommands([
                HealthFreshCommand::class,
            ])
            ->hasRoute('web')
            ->hasAssets()
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        $this->loadMigrationsFrom($this->package->basePath('/../database/migrations'));

        if (Str::of(request()?->path())->startsWith(config('health.route_prefix'))) {
            app('router')
                ->pushMiddlewareToGroup('web', HandleInertiaRequests::class);
        }
    }

    public function packageRegistered(): void
    {
        $this->app->bind('health', fn ($app) => new Health);
        $this->app->singletonIf(Distance::class, fn ($app) => new DistanceConversion);
        $this->app->singletonIf(Duration::class, fn ($app) => new DurationConversion);
        $this->app->singletonIf(Weight::class, fn ($app) => new WeightConversion);
        $this->app->singleton('app.health', fn () => new HealthApp()->get());
        $this->app->singleton(
            'health.settings',
            fn ($app) => $app->make('settings')->forApp($app->make('app.health')),
        );
    }
}
