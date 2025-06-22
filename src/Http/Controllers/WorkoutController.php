<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Requests\WorkoutRequest;
use Coleus\Health\Http\Resources\ExerciseAsOptionResource;
use Coleus\Health\Http\Resources\WorkoutResource;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\Workout;
use Coleus\Health\Services\WorkoutService;
use Coleus\Health\Services\WorkoutTable;
use App\Http\Controllers\Controller;
use DB;
use Inertia\Inertia;

class WorkoutController extends Controller
{
    public function index()
    {
        return Inertia::render('@health/workouts/Index', [
            'collection' => WorkoutResource::collection(WorkoutTable::query()->paginate()),
        ]);
    }

    public function create()
    {
        $default = new Workout(['date' => now('America/Denver')]);

        return Inertia::render('@health/workouts/Create', [
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
        return Inertia::render('@health/workouts/Edit', [
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
