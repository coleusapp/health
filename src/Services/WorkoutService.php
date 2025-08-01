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
                        'weight_unit' => $exercise['weight_unit'] ?? null,
                        'distance' => $exercise['distance'] ?? null,
                        'distance_unit' => $exercise['distance_unit'] ?? null,
                        'duration' => $exercise['duration'] ?? null,
                        'duration_unit' => $exercise['duration_unit'] ?? null,
                        'calorie' => $exercise['calorie'] ?? null,
                        'calorie_unit' => $exercise['calorie_unit'] ?? null,
                    ]);
                });
        });

        return $workout;
    }
}
