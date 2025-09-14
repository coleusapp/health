<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Http\Requests\ExerciseRequest;
use Coleus\Health\Http\Resources\CategoryAsOptionResource;
use Coleus\Health\Http\Resources\ExerciseResource;
use Coleus\Health\Http\Resources\MuscleGroupAsOptionResource;
use Coleus\Health\Models\Category;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Health\Services\ExerciseTable;
use Coleus\Support\Resources\EnumResource;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ExerciseController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('exercises/Index', [
            'collection' => ExerciseResource::collection(ExerciseTable::query()->paginate()),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('exercises/Create', [
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'calorie_units' => EnumResource::collectionWithNull(CalorieEnum::cases()),
            'muscle_groups' => MuscleGroupAsOptionResource::collection(MuscleGroup::get()),
            'categories' => CategoryAsOptionResource::collection(Category::get()),
        ]);
    }

    public function store(ExerciseRequest $request): RedirectResponse
    {
        $exercise = Exercise::create($request->validated());

        $exercise->categories()->attach($request->flatten('categories'));
        $exercise->muscleGroups()->attach($request->flatten('muscle_groups'));

        return to_route('health.exercises.edit', ['exercise' => $exercise]);
    }

    public function edit(Exercise $exercise): Response
    {
        return Inertia::render('exercises/Edit', [
            'resource' => ExerciseResource::make($exercise->load('muscleGroups', 'categories')),
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'calorie_units' => EnumResource::collectionWithNull(CalorieEnum::cases()),
            'muscle_groups' => MuscleGroupAsOptionResource::collection(MuscleGroup::get()),
            'categories' => CategoryAsOptionResource::collection(Category::get()),
        ]);
    }

    public function update(ExerciseRequest $request, Exercise $exercise): RedirectResponse
    {
        $exercise->update($request->validated());

        $exercise->categories()->sync($request->flatten('categories'));
        $exercise->muscleGroups()->sync($request->flatten('muscle_groups'));

        return back();
    }

    public function destroy(Exercise $exercise): RedirectResponse
    {
        $exercise->delete();

        return back();
    }
}
