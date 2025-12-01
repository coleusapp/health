<?php

use Coleus\Health\Http\Controllers\DashboardController;
use Coleus\Health\Http\Controllers\ExerciseController;
use Coleus\Health\Http\Controllers\MuscleGroupController;
use Coleus\Health\Http\Controllers\OralCareController;
use Coleus\Health\Http\Controllers\SettingsController;
use Coleus\Health\Http\Controllers\ToothpasteController;
use Coleus\Health\Http\Controllers\WeightController;
use Coleus\Health\Http\Controllers\CategoryController;
use Coleus\Health\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])
    ->name('health.')
    ->prefix('health')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('weights', WeightController::class)->except('show');
        Route::resource('workouts', WorkoutController::class)->except('show');
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('muscle-groups', MuscleGroupController::class)->except('show');
        Route::resource('exercises', ExerciseController::class)->except('show');
        Route::resource('oral-cares', OralCareController::class)->except('show');
        Route::resource('toothpastes', ToothpasteController::class)->except('show');
        Route::get('settings', [SettingsController::class, 'general'])->name('settings.general');
        Route::post('settings', [SettingsController::class, 'save'])->name('settings.save');
    });
