<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Charts\WeightChart;
use Coleus\Health\Facades\Health;
use Coleus\Health\Http\Resources\CategoryResource;
use Coleus\Health\Http\Resources\ExerciseResource;
use Coleus\Health\Http\Resources\MuscleGroupResource;
use Coleus\Health\Http\Resources\ToothpasteResource;
use Coleus\Health\Http\Resources\WeightResource;
use Coleus\Health\Http\Resources\WorkoutResource;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Dashboard', [
            'weights' => WeightResource::collection(Health::weight()->index()),
            'categories' => CategoryResource::collection(Health::category()->index()),
            'muscle_groups' => MuscleGroupResource::collection(Health::muscleGroup()->index()),
            'toothpastes' => ToothpasteResource::collection(Health::toothpaste()->index()),
            'exercises' => ExerciseResource::collection(Health::exercise()->index()),
            'workouts' => WorkoutResource::collection(Health::workout()->index()),
            'weights_chart' => WeightChart::getData(),
        ]);
    }
}