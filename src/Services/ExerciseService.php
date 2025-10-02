<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\ExerciseData;
use Coleus\Health\Models\Exercise;
use Coleus\Support\Services\Service;
use Illuminate\Support\Facades\DB;

class ExerciseService extends Service
{
    protected $model = Exercise::class;

    protected $data = ExerciseData::class;

    /**
     * @throws \Throwable
     */
    public function store(mixed $payload): bool
    {
        DB::beginTransaction();
        try {
            $model = Exercise::create($payload);
            $model->categories()->sync(collect($payload['categories'] ?? [])->pluck('id'));
            $model->muscleGroups()->sync(collect($payload['muscle_groups'] ?? [])->pluck('id'));
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
        }

        return $result ?? false;
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
}
