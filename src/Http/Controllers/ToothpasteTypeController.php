<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Requests\ToothpasteType\StoreRequest;
use Coleus\Health\Http\Requests\ToothpasteType\UpdateRequest;
use Coleus\Health\Http\Resources\ToothpasteTypeResource;
use Coleus\Health\Models\ToothpasteType;
use Coleus\Health\Services\ToothpasteTypeTable;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ToothpasteTypeController extends Controller
{
    public function index()
    {
        return Inertia::render('@health/workouts/categories/Index', [
            'collection' => ToothpasteTypeResource::collection(ToothpasteTypeTable::query()->paginate()),
        ]);
    }

    public function create()
    {
        return Inertia::render('@health/workouts/categories/Create');
    }

    public function store(StoreRequest $request)
    {
        $category = ToothpasteType::create($request->validated());

        return to_route('health.categories.edit', ['resource' => $category]);
    }

    public function edit(ToothpasteType $category)
    {
        return Inertia::render('@health/workouts/categories/Edit', [
            'resource' => ToothpasteTypeResource::make($category),
        ]);
    }

    public function update(UpdateRequest $request, ToothpasteType $category)
    {
        $category->update($request->validated());

        return back();
    }

    public function destroy(ToothpasteType $category)
    {
        $category->delete();

        return to_route('health.categories.index');
    }
}
