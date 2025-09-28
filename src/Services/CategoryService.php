<?php

namespace Coleus\Health\Services;

use Coleus\Health\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService
{
    public static function index(): LengthAwarePaginator
    {
        return Category::orderBy('created_at', 'desc')
            ->paginate();
    }

    public static function store(array $data): Category
    {
        return Category::create($data);
    }

    public static function update(Category $category, array $data): bool
    {
        return $category->update($data);
    }

    public static function destroy(Category $category): bool
    {
        return $category->delete();
    }
}
