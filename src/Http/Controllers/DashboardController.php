<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Http\Resources\CategoryResource;
use Coleus\Health\Http\Resources\ExerciseResource;
use Coleus\Health\Http\Resources\MuscleGroupResource;
use Coleus\Health\Http\Resources\ToothpasteResource;
use Coleus\Health\Http\Resources\WeightResource;
use Coleus\Health\Http\Resources\WorkoutResource;
use Coleus\Health\Services\CategoryTable;
use Coleus\Health\Services\ExerciseTable;
use Coleus\Health\Services\MuscleGroupService;
use Coleus\Health\Services\ToothpasteService;
use Coleus\Health\Services\WeightChart;
use Coleus\Health\Services\WeightTable;
use Coleus\Health\Services\WorkoutTable;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('@health/Dashboard', [
            'weights' => WeightResource::collection(WeightTable::query()->paginate()),
            'categories' => CategoryResource::collection(CategoryTable::query()->paginate()),
            'muscle_groups' => MuscleGroupResource::collection(MuscleGroupService::indexQuery()->paginate()),
            'toothpastes' => ToothpasteResource::collection(ToothpasteService::indexQuery()->paginate()),
            'exercises' => ExerciseResource::collection(ExerciseTable::query()->paginate()),
            'workouts' => WorkoutResource::collection(WorkoutTable::query()->paginate()),
            'weights_chart' => WeightChart::getData(),
        ]);
    }
}