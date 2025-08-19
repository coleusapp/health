<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Toothpaste;
use Illuminate\Database\Eloquent\Builder;

class ToothpasteService
{
    public static function indexQuery(): Builder
    {
        return Toothpaste::query()->orderBy('created_at', 'desc');
    }
}