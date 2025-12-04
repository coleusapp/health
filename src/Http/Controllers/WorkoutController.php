<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Data\ExerciseData;
use Coleus\Health\Data\WorkoutData;
use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Facades\Health;
use Coleus\Health\Http\Requests\WorkoutRequest;
use Coleus\Health\Http\Resources\ExerciseAsOptionResource;
use Coleus\Health\Http\Resources\WorkoutResource;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\Workout;
use App\Http\Controllers\Controller;
use Coleus\Health\Settings\GeneralSettings;
use Coleus\Support\Resources\EnumResource;
use Inertia\Inertia;

class WorkoutController extends Controller
{
    public function index()
    {
        return Inertia::render('workouts/Index', [
            'collection' => WorkoutResource::collection(Health::workout()->index()),
        ]);
    }

    public function create()
    {
        return Inertia::render('workouts/Create', [
            'resource' => new WorkoutResource(Health::workout()->default()),
            'exercises' => ExerciseAsOptionResource::collection(Health::exercise()->options()),
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'calorie_units' => EnumResource::collectionWithNull(CalorieEnum::cases()),
        ]);
    }

    public function store(WorkoutRequest $request)
    {
        return to_route('health.workouts.edit', [
            'workout' => new WorkoutResource(Health::workout()->store($request->validated())),
        ]);
    }

    public function edit(Workout $workout)
    {
        return Inertia::render('workouts/Edit', [
            'resource' => WorkoutResource::make($workout->load('exercises')),
            'exercises' => ExerciseAsOptionResource::collection(Health::exercise()->options()),
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'calorie_units' => EnumResource::collectionWithNull(CalorieEnum::cases()),
        ]);
    }

    /**
     * @throws \Throwable
     */
    public function update(WorkoutRequest $request, Workout $workout)
    {
        return to_route('health.workouts.edit', [
            'workout' => WorkoutResource::make(Health::workout()->update($workout, $request->validated())),
        ]);
    }

    public function destroy(Workout $workout)
    {
        $workout->delete();

        return back();
    }
}
