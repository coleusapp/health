<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Requests\WorkoutCategory\StoreRequest;
use Coleus\Health\Http\Requests\WorkoutCategory\UpdateRequest;
use Coleus\Health\Http\Resources\CategoryResource;
use Coleus\Health\Models\Category;
use Coleus\Health\Services\CategoryTable;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('@health/workouts/categories/Index', [
            'collection' => CategoryResource::collection(CategoryTable::query()->paginate()),
        ]);
    }

    public function create()
    {
        return Inertia::render('@health/workouts/categories/Create');
    }

    public function store(StoreRequest $request)
    {
        $category = Category::create($request->validated());

        return to_route('health.categories.edit', ['resource' => $category]);
    }

    public function edit(Category $category)
    {
        return Inertia::render('@health/workouts/categories/Edit', [
            'resource' => CategoryResource::make($category),
        ]);
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return back();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return back();
    }
}
