<?php

namespace Coleus\Health\Services;

use Coleus\Health\Http\Requests\WorkoutRequest;
use Coleus\Health\Models\Workout;
use DB;

class WorkoutService
{
    public static function save(WorkoutRequest $request, ?Workout $workout = null): Workout
    {
        if ($workout) {
            $workout->update($request->only('date'));
        } else {
            $workout = Workout::create($request->only('date'));
        }

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

        return $workout;
    }
}
