<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Facades\Health;
use Coleus\Health\Http\Requests\ExerciseRequest;
use Coleus\Health\Http\Resources\CategoryAsOptionResource;
use Coleus\Health\Http\Resources\ExerciseResource;
use Coleus\Health\Http\Resources\MuscleGroupAsOptionResource;
use Coleus\Health\Models\Category;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Health\Services\ExerciseService;
use Coleus\Support\Resources\EnumResource;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ExerciseController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('exercises/Index', [
            'collection' => ExerciseResource::collection(Health::exercise()->index()),
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
        return to_route('health.exercises.edit', [
            'exercise' => Health::exercise()->store(
                $request->validated(),
            ),
        ]);
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
        Health::exercise()->update(
            $exercise,
            $request->validated(),
        );

        return back();
    }

    public function destroy(Exercise $exercise): RedirectResponse
    {
        Health::exercise()->destroy($exercise);

        return back();
    }
}
