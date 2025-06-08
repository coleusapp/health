<?php

use Coleus\Health\Http\Controllers\DashboardController;
use Coleus\Health\Http\Controllers\ExerciseController;
use Coleus\Health\Http\Controllers\MuscleGroupController;
use Coleus\Health\Http\Controllers\WeightController;
use Coleus\Health\Http\Controllers\CategoryController;
use Coleus\Health\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::middleware('web')->name('health.')->prefix('health')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('weights', WeightController::class);
    Route::resource('workouts', WorkoutController::class)->except('show');
    Route::name('workouts.')->prefix('workouts')->group(function () {
        Route::resource('muscle-groups', MuscleGroupController::class)->except('show');
        Route::resource('exercises', ExerciseController::class)->except('show');
    });
})->middleware(['auth', 'verified']);
