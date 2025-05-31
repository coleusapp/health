<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Resources\ExerciseResource;
use Coleus\Health\Http\Resources\MuscleGroupResource;
use Coleus\Health\Http\Resources\ToothpasteTypeResource;
use Coleus\Health\Http\Resources\WeightResource;
use Coleus\Health\Http\Resources\CategoryResource;
use Coleus\Health\Http\Resources\WorkoutResource;
use Coleus\Health\Services\ExerciseTable;
use Coleus\Health\Services\ToothpasteTypeTable;
use Coleus\Health\Services\Weight\WeightTable;
use Coleus\Health\Services\Workout\MuscleGroup\MuscleGroupTable;
use Coleus\Health\Services\CategoryTable;
use Coleus\Health\Services\WorkoutTable;
use App\Http\Controllers\Controller;
use Coleus\Support\Shit;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('@health/Dashboard', [
            'weights' => WeightResource::collection(WeightTable::query()->paginate()),
            'categories' => CategoryResource::collection(CategoryTable::query()->paginate()),
            'muscle_groups' => MuscleGroupResource::collection(MuscleGroupTable::query()->paginate()),
            'toothpaste_types' => ToothpasteTypeResource::collection(ToothpasteTypeTable::query()->paginate()),
            'exercises' => ExerciseResource::collection(ExerciseTable::query()->paginate()),
            'workouts' => WorkoutResource::collection(WorkoutTable::query()->paginate()),
        ]);
    }
}