<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Requests\Toothpaste\StoreRequest;
use Coleus\Health\Http\Requests\Toothpaste\UpdateRequest;
use Coleus\Health\Http\Requests\ToothpasteRequest;
use Coleus\Health\Http\Resources\ToothpasteResource;
use Coleus\Health\Models\Toothpaste;
use Coleus\Health\Services\ToothpasteService;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ToothpasteController extends Controller
{
    public function index()
    {
        $collection = ToothpasteService::indexQuery()
            ->paginate();


        return Inertia::render('@health/toothpastes/Index', [
            'collection' => ToothpasteResource::collection($collection),
        ]);
    }

    public function create()
    {
        return Inertia::render('@health/toothpastes/Create');
    }

    public function store(ToothpasteRequest $request)
    {
        $toothpaste = Toothpaste::create($request->validated());

        return to_route('health.toothpastes.edit', ['toothpaste' => $toothpaste]);
    }

    public function edit(Toothpaste $Toothpaste)
    {
        return Inertia::render('@health/toothpastes/Edit', [
            'resource' => ToothpasteResource::make($Toothpaste),
        ]);
    }

    public function update(ToothpasteRequest $request, Toothpaste $toothpaste)
    {
        $toothpaste->update($request->validated());

        return back();
    }

    public function destroy(Toothpaste $toothpaste)
    {
        $toothpaste->delete();

        return to_route('health.toothpastes.index');
    }
}
