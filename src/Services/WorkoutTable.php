<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Workout;
use Coleus\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class WorkoutTable extends Table
{
    public static function query(): Builder
    {
        return Workout::query()
            ->orderBy('created_at', 'desc');
    }
}
