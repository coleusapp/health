<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\WorkoutData;
use Coleus\Health\Models\Workout;
use Coleus\Support\Services\Service;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
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

            $workout->exercises()->detach();
            collect($payload['exercises'] ?? [])
                ->each(fn($item) => $workout->exercises()->attach(
                    $item['id'],
                    collect($item)->except('id')->toArray()
                ));
            DB::commit();
        } catch (Throwable $e) {
            logger()->error($e->getMessage());
            logger()->error($e->getTraceAsString());
            DB::rollBack();
        }

        return $workout;
    }
}
