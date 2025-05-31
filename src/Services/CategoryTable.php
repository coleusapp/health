<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Category;
use Coleus\Table\Table;
use Illuminate\Database\Eloquent\Builder;

class CategoryTable extends Table
{
    public static function query(): Builder
    {
        return Category::query()
            ->orderBy('created_at', 'desc');
    }
}