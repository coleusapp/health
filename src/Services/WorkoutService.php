<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\WorkoutData;
use Coleus\Health\Models\Workout;
use Coleus\Support\Services\Service;
use DB;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class WorkoutService extends Service
{
    protected $model = Workout::class;

    protected $data = WorkoutData::class;

    public function index(): LengthAwarePaginator
    {
        return Workout::withCount('exercises')
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    /**
     * @throws \Throwable
     */
    protected function save(array $payload, ?Workout $workout = null): Workout
    {
        DB::beginTransaction();
        try {
            $workout = $workout ?? Workout::create($payload);

            $workout->exercises()->sync(
                collect($payload['exercises'] ?? [])
                    ->mapWithKeys(fn ($item) => [
                        $item['id'] => collect($item)->except('id')
                    ])
                    ->toArray());
            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
        }

        return $workout;
    }
}
