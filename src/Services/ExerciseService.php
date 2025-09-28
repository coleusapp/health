<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Exercise;
use Illuminate\Pagination\LengthAwarePaginator;

class ExerciseService
{
    public static function index(): LengthAwarePaginator
    {
        return Exercise::orderBy('created_at', 'desc')
            ->paginate();
    }

    public static function store(array $data, array $categories = [], array $muscleGroups = []): Exercise
    {
        $exercise = Exercise::create($data);
        $exercise->categories()->attach($categories);
        $exercise->muscleGroups()->attach($muscleGroups);

        return $exercise;
    }

    public static function update(Exercise $exercise, array $data, array $categories = [], array $muscleGroups = []): bool
    {
        $result = $exercise->update($data);
        $exercise->categories()->sync($categories);
        $exercise->muscleGroups()->sync($muscleGroups);

        return $result;
    }

    public static function destroy(Exercise $exercise): bool
    {
        return $exercise->delete();
    }
}
