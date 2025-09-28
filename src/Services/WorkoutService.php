<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Workout;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class WorkoutService
{
    public static function index(): LengthAwarePaginator
    {
        return Workout::withCount('exercises')
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    /**
     * @throws \Throwable
     */
    public static function store(array $data): Workout
    {
        $data = collect($data);
        $workout = Workout::create($data->only('date')->toArray());
        return static::save($data->except('date')->toArray(), $workout);
    }

    public static function update(Workout $workout, array $data): Workout
    {
        $data = collect($data);
        $workout->update($data->only('date')->toArray());
        return static::save($data->except('date')->toArray(), $workout);
    }

    /**
     * @throws \Throwable
     */
    protected static function save(array $data, ?Workout $workout = null): Workout
    {
        $data = collect($data);

        DB::transaction(function () use ($workout, $data) {
            $workout->exercises()->detach();
            collect($data->get('exercises'))
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

    public static function destroy(Workout $workout): bool
    {
        return $workout->delete();
    }
}
