<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Http\Requests\WeightRequest;
use Coleus\Health\Http\Resources\WeightResource;
use Coleus\Health\Models\Weight;
use Coleus\Health\Services\WeightService;
use Coleus\Support\Resources\EnumResource;
use Inertia\Inertia;

class WeightController extends Controller
{
    public function index()
    {
        return Inertia::render('weights/Index', [
            'collection' => WeightResource::collection(WeightService::query()->paginate()),
        ]);
    }

    public function create()
    {
        $default = Weight::latest('created_at')->first() ?? new Weight(['weight' => 1]);
        $default->date = now('America/Denver');

        return Inertia::render('weights/Create', [
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'resource' => new WeightResource($default),
        ]);
    }

    public function store(WeightRequest $request)
    {
        $weight = Weight::create($request->all());

        return to_route('health.weights.edit', ['weight' => new WeightResource($weight)]);
    }

    public function edit(Weight $weight)
    {
        return Inertia::render('weights/Edit', [
            'weight_units' => EnumResource::collectionWithNull(WeightEnum::cases()),
            'resource' => new WeightResource($weight),
        ]);
    }

    public function update(WeightRequest $request, Weight $weight)
    {
        $weight->update($request->all());

        return to_route('health.weights.edit', ['weight' => new WeightResource($weight)]);
    }

    public function destroy(Weight $weight)
    {
        $weight->delete();

        return to_route('health.weights.index');
    }
}
