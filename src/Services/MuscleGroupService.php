<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\MuscleGroup;
use Coleus\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class MuscleGroupService
{
    public static function indexQuery(): Builder
    {
        return MuscleGroup::with('parent')
            ->orderBy('created_at', 'desc');
    }
}