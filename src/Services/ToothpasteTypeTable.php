<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\ToothpasteType;
use Coleus\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class ToothpasteTypeTable extends Table
{
    public static function query(): Builder
    {
        return ToothpasteType::query()
            ->orderBy('created_at', 'desc');
    }
}