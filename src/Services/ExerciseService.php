<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\ExerciseData;
use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Facades\Settings;
use Coleus\Health\Models\Exercise;
use Coleus\Support\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExerciseService extends Service
{
    protected $model = Exercise::class;

    protected $data = ExerciseData::class;

    /**
     * @throws \Throwable
     */
    public function store(mixed $payload): ?Model
    {
        $model = null;
        DB::beginTransaction();
        try {
            $model = Exercise::create($payload);
            $model->categories()->sync(collect($payload['categories'] ?? [])->pluck('id'));
            $model->muscleGroups()->sync(collect($payload['muscle_groups'] ?? [])->pluck('id'));
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }

        return $model;
    }

    /**
     * @throws \Throwable
     */
    public function update(mixed $model, mixed $payload): bool
    {
        DB::beginTransaction();
        try {
            $result = $model->update($payload);
            $model->categories()->sync(collect($payload['categories'] ?? [])->pluck('id'));
            $model->muscleGroups()->sync(collect($payload['muscle_groups'] ?? [])->pluck('id'));
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }

        return $result ?? false;
    }

    public function options(): array
    {
        return [
            ExerciseData::from(['name' => '-- select one --']),
            ...Exercise::all(),
        ];
    }

    public function default(): Exercise
    {
        return new Exercise([
            'calorie_unit' => Settings::get('calorie_unit', CalorieEnum::KCAL->value),
            'duration_unit' => Settings::get('duration_unit', DurationEnum::Minute->value),
            'distance_unit' => Settings::get('distance_unit', DistanceEnum::Mile->value),
            'weight_unit' => Settings::get('weight_unit', WeightEnum::LBS->value),
        ]);
    }
}
