<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Toothpaste;
use Illuminate\Pagination\LengthAwarePaginator;

class ToothpasteService
{
    public static function index(): LengthAwarePaginator
    {
        return Toothpaste::orderBy('created_at', 'desc')
            ->paginate();
    }

    public static function store(array $data): Toothpaste
    {
        return Toothpaste::create($data);
    }

    public static function update(Toothpaste $toothpaste, array $data): bool
    {
        return $toothpaste->update($data);
    }

    public static function destroy(Toothpaste $toothpaste): bool
    {
        return $toothpaste->delete();
    }
}
