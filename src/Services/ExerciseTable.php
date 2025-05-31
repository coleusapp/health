<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Exercise;
use Coleus\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class ExerciseTable extends Table
{
    public static function query(): Builder
    {
        return Exercise::query()
            ->orderBy('created_at', 'desc');
    }
}