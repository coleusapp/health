<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\WorkoutData;
use Coleus\Health\Models\Workout;
use Coleus\Support\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * @extends Service<Workout, WorkoutData>
 */
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
     * @param  array<string, mixed>  $payload
     * @param  Workout|null  $model
     * @throws \Throwable
     */
    protected function save(array $payload, ?Model $model = null): Workout
    {
        DB::beginTransaction();
        try {
            $model = $model ?? Workout::create($payload);

            $model->exercises()->detach();
            collect($payload['exercises'] ?? [])
                ->each(fn($item) => $model->exercises()->attach(
                    $item['id'],
                    collect($item)->except('id')->toArray()
                ));
            DB::commit();
        } catch (Throwable $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            DB::rollBack();
        }

        return $model;
    }
}
