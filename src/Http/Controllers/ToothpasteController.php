<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Facades\Health;
use Coleus\Health\Http\Requests\ToothpasteRequest;
use Coleus\Health\Http\Resources\ToothpasteResource;
use Coleus\Health\Models\Toothpaste;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ToothpasteController extends Controller
{
    public function index()
    {
        return Inertia::render('toothpastes/Index', [
            'collection' => ToothpasteResource::collection(Health::toothpaste()->index()),
        ]);
    }

    public function create()
    {
        return Inertia::render('toothpastes/Create');
    }

    public function store(ToothpasteRequest $request)
    {
        return to_route('health.toothpastes.edit', [
            'toothpaste' => Health::toothpaste()->store($request->validated()),
        ]);
    }

    public function edit(Toothpaste $toothpaste)
    {
        return Inertia::render('toothpastes/Edit', [
            'resource' => ToothpasteResource::make($toothpaste),
        ]);
    }

    public function update(ToothpasteRequest $request, Toothpaste $toothpaste)
    {
        Health::toothpaste()->update($toothpaste, $request->validated());

        return back();
    }

    public function destroy(Toothpaste $toothpaste)
    {
        Health::toothpaste()->destroy($toothpaste);

        return to_route('health.toothpastes.index');
    }
}
