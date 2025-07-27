<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Http\Requests\Weight\SaveRequest;
use Coleus\Health\Http\Resources\WeightResource;
use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\Weight;
use Coleus\Health\Services\WeightTable;
use Coleus\Users\Models\User;
use Inertia\Inertia;

class WeightController extends Controller
{
    public function index()
    {
        return Inertia::render('@health/weights/Index', [
            'collection' => WeightResource::collection(WeightTable::query()->paginate()),
        ]);
    }

    public function create()
    {
        $default = Weight::latest('created_at')->first() ?? new Weight(['weight' => 1]);
        $default->date = now('America/Denver');

        return Inertia::render('@health/weights/Create', [
            'resource' => new WeightResource($default),
        ]);
    }

    public function store(SaveRequest $request)
    {
        $weight = Weight::create($request->all());

        return to_route('health.weights.edit', ['weight' => new WeightResource($weight)]);
    }

    public function edit(Weight $weight)
    {
        return Inertia::render('@health/weights/Edit', [
            'resource' => new WeightResource($weight),
        ]);
    }

    public function update(SaveRequest $request, Weight $weight)
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
