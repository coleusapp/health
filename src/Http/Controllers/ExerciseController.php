<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Http\Requests\Exercise\SaveRequest;
use Coleus\Health\Http\Resources\CategoryAsOptionResource;
use Coleus\Health\Http\Resources\ExerciseResource;
use Coleus\Health\Http\Resources\MuscleGroupAsOptionResource;
use Coleus\Health\Models\Category;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Health\Services\ExerciseTable;
use App\Http\Controllers\Controller;
use App\Packages\Support\Resources\EnumResource;
use Inertia\Inertia;

class ExerciseController extends Controller
{
    public function index()
    {
        return Inertia::render('@health/exercises/Index', [
            'collection' => ExerciseResource::collection(ExerciseTable::query()->paginate()),
        ]);
    }

    public function create()
    {
        return Inertia::render('@health/exercises/Create', [
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'muscle_groups' => MuscleGroupAsOptionResource::collection(MuscleGroup::get()),
            'categories' => CategoryAsOptionResource::collection(Category::get()),
        ]);
    }

    public function store(SaveRequest $request)
    {
        $exercise = Exercise::create($request->validated());

        $exercise->categories()->attach($request->flatten('categories'));
        $exercise->muscleGroups()->attach($request->flatten('muscle_groups'));

        return to_route('health.workouts.exercises.edit', ['exercise' => $exercise]);
    }

    public function edit(Exercise $exercise)
    {
        return Inertia::render('@health/exercises/Edit', [
            'resource' => ExerciseResource::make($exercise->load('muscleGroups', 'categories')),
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'muscle_groups' => MuscleGroupAsOptionResource::collection(MuscleGroup::get()),
            'categories' => CategoryAsOptionResource::collection(Category::get()),
        ]);
    }

    public function update(SaveRequest $request, Exercise $exercise)
    {
        $exercise->update($request->validated());

        $exercise->categories()->sync($request->flatten('categories'));
        $exercise->muscleGroups()->sync($request->flatten('muscle_groups'));

        return back();
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();

        return back();
    }
}
