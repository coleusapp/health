<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\MuscleGroup;
use Illuminate\Pagination\LengthAwarePaginator;

class MuscleGroupService
{
    public static function index(): LengthAwarePaginator
    {
        return MuscleGroup::orderBy('created_at', 'desc')
            ->paginate();
    }

    public static function store(array $data): MuscleGroup
    {
        return MuscleGroup::create($data);
    }

    public static function update(MuscleGroup $muscleGroup, array $data): bool
    {
        return $muscleGroup->update($data);
    }

    public static function destroy(MuscleGroup $muscleGroup): bool
    {
        return $muscleGroup->delete();
    }
}
