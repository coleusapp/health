<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Requests\CategoryRequest;
use Coleus\Health\Http\Resources\CategoryResource;
use Coleus\Health\Models\Category;
use Coleus\Health\Services\CategoryTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('@health/categories/Index', [
            'collection' => CategoryResource::collection(CategoryTable::query()->paginate()),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('@health/categories/Create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->validated());

        return to_route('health.categories.edit', [
            'category' => $category
        ]);
    }

    public function edit(Category $category): Response
    {
        return Inertia::render('@health/categories/Edit', [
            'resource' => CategoryResource::make($category),
        ]);
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
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
