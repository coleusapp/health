<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Requests\WorkoutRequest;
use Coleus\Health\Http\Resources\ExerciseAsOptionResource;
use Coleus\Health\Http\Resources\WorkoutResource;
use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\Workout;
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

    public function store(WorkoutRequest $request)
    {
        $workout = Workout::create($request->all());

        return to_route('health.workouts.edit', ['workout' => new WorkoutResource($workout)]);
    }

    public function create()
    {
        $default = Workout::latest('created_at')->first() ?? new Workout(['workout' => 1]);
        $default->date = now('America/Denver');

        return Inertia::render('@health/workouts/Create', [
            'resource' => new WorkoutResource($default),
        ]);
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
        $workout->update($request->only('date'));

        DB::transaction(function () use ($workout, $request) {
            $workout->exercises()->detach();
            collect($request->validated('exercises'))
                ->each(function ($exercise) use ($workout) {
                    $workout->exercises()->attach($exercise['id'], [
                        'reps' => $exercise['reps'] ?? null,
                        'weight' => $exercise['weight'] ?? null,
                        'distance' => $exercise['distance'] ?? null,
                        'duration' => $exercise['duration'] ?? null,
                        'calorie' => $exercise['calorie'] ?? null,
                        'user_id' => auth()->id(),
                    ]);
                });
        });

        return to_route('health.workouts.edit', ['workout' => new WorkoutResource($workout)]);
    }

    public function destroy(Workout $workout)
    {
        $workout->delete();

        return back();
    }
}
