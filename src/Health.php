<?php

namespace Coleus\Health;

use Coleus\Health\Services\CategoryService;
use Coleus\Health\Services\ExerciseService;
use Coleus\Health\Services\MuscleGroupService;
use Coleus\Health\Services\OralCareService;
use Coleus\Health\Services\ToothpasteService;
use Coleus\Health\Services\WeightService;
use Coleus\Health\Services\WorkoutService;

class Health
{
    public static function category(): CategoryService
    {
        return new CategoryService();
    }

    public static function exercise(): ExerciseService
    {
        return new ExerciseService();
    }

    public static function muscleGroup(): MuscleGroupService
    {
        return new MuscleGroupService();
    }

    public static function oralCare(): OralCareService
    {
        return new OralCareService();
    }

    public static function toothpaste(): ToothpasteService
    {
        return new ToothpasteService();
    }

    public static function weight(): WeightService
    {
        return new WeightService();
    }

    public static function workout(): WorkoutService
    {
        return new WorkoutService();
    }
}
