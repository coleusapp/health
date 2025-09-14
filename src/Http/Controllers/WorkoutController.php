<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Http\Requests\WorkoutRequest;
use Coleus\Health\Http\Resources\ExerciseAsOptionResource;
use Coleus\Health\Http\Resources\WorkoutResource;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\Workout;
use Coleus\Health\Services\WorkoutService;
use Coleus\Health\Services\WorkoutTable;
use App\Http\Controllers\Controller;
use Coleus\Support\Resources\EnumResource;
use Inertia\Inertia;

class WorkoutController extends Controller
{
    public function index()
    {
        return Inertia::render('workouts/Index', [
            'collection' => WorkoutResource::collection(
                WorkoutTable::query()->withCount('exercises')->paginate()
            ),
        ]);
    }

    public function create()
    {
        $default = new Workout(['date' => now('America/Denver')]);

        return Inertia::render('workouts/Create', [
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'calorie_units' => EnumResource::collectionWithNull(CalorieEnum::cases()),
            'resource' => new WorkoutResource($default),
            'exercises' => ExerciseAsOptionResource::collection(Exercise::all()),
        ]);
    }

    public function store(WorkoutRequest $request)
    {
        $workout = WorkoutService::save($request);

        return to_route('health.workouts.edit', ['workout' => new WorkoutResource($workout)]);
    }

    public function edit(Workout $workout)
    {
        return Inertia::render('workouts/Edit', [
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'distance_units' => EnumResource::collectionWithNull(DistanceEnum::cases()),
            'duration_units' => EnumResource::collectionWithNull(DurationEnum::cases()),
            'calorie_units' => EnumResource::collectionWithNull(CalorieEnum::cases()),
            'resource' => WorkoutResource::make($workout->load('exercises')),
            'exercises' => ExerciseAsOptionResource::collection(Exercise::all()),
        ]);
    }

    /**
     * @throws \Throwable
     */
    public function update(WorkoutRequest $request, Workout $workout)
    {
        WorkoutService::save($request, $workout);

        return to_route('health.workouts.edit', ['workout' => new WorkoutResource($workout)]);
    }

    public function destroy(Workout $workout)
    {
        $workout->delete();

        return back();
    }
}
