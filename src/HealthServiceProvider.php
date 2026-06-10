<?php

namespace Coleus\Health;

use Coleus\Health\Commands\HealthFreshCommand;
use Coleus\Health\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('health')
            ->hasConfigFile()
            ->hasMigrations(array_map(
                fn ($migration) => config('health.name')."/$migration",
                [
                    'health/create_muscle_groups_table',
                    'health/create_exercises_table',
                    'health/create_workouts_table',
                    'health/create_weights_table',
                    'health/create_oral_cares_table',
                    'health/create_toothpastes_table',
                    'health/create_oral_care_toothpaste_table',
                    'health/create_exercise_muscle_groups_table',
                    'health/create_exercise_workout_table',
                    'health/create_categories_table',
                    'health/create_category_exercises_table',
                    // 'health/create_settings_table',
                ]))
            ->runsMigrations()
            ->hasCommands([
                HealthFreshCommand::class,
            ])
            ->hasRoute('web')
            ->hasAssets()
            ->hasViews();
    }

    public function bootingPackage(): void
    {
        if (Str::of(request()?->path())->startsWith(config('health.route_prefix'))) {
            app('router')
                ->pushMiddlewareToGroup('web', HandleInertiaRequests::class);
        }
    }

    public function packageRegistered(): void
    {
        $this->app->bind('health', function ($app) {
            return new Health;
        });
    }
}
