<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\MuscleGroup;
use Coleus\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class MuscleGroupTable extends Table
{
    public static function query(): Builder
    {
        return MuscleGroup::query()
            ->orderBy('created_at', 'desc');
    }
}