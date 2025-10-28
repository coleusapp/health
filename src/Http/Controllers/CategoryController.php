<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Data\CategoryData;
use Coleus\Health\Facades\Health;
use Coleus\Health\Http\Requests\CategoryRequest;
use Coleus\Health\Http\Resources\CategoryResource;
use Coleus\Health\Models\Category;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('categories/Index', [
            'collection' => CategoryResource::collection(Health::category()->index()),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('categories/Create');
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        return to_route('health.categories.edit', [
            'category' => Health::category()->store($request),
        ]);
    }

    public function edit(Category $category): Response
    {
        return Inertia::render('categories/Edit', [
            'resource' => CategoryResource::make($category),
        ]);
    }

    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        Health::category()->update($category, $request->validated());

        return to_route('health.categories.edit', ['category' => $category]);
    }

    public function destroy(Category $category)
    {
        Health::category()->destroy($category);

        return back();
    }
}
