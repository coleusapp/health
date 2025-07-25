<?php

namespace Coleus\Health;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class HealthServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('health')
            ->hasConfigFile()
            ->hasMigrations([
                'create_muscle_groups_table',
                'create_exercises_table',
                'create_workouts_table',
                'create_weights_table',
                'create_oral_cares_table',
                'create_toothpaste_types_table',
                'create_oral_care_toothpaste_type_table',
                'create_exercise_muscle_groups_table',
                'create_exercise_workout_table',
                'create_categories_table',
                'create_category_exercises_table',
            ])
            ->runsMigrations()
            ->hasRoute('web');
    }
}
