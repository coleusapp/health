<?php

namespace Coleus\Health\Http\Controllers;

use Coleus\Health\Http\Requests\MuscleGroup\SaveRequest;
use Coleus\Health\Http\Resources\MuscleGroupResource;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Health\Services\Workout\MuscleGroup\MuscleGroupTable;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class MuscleGroupController extends Controller
{
    public function index()
    {
        return Inertia::render('@health/workouts/muscleGroups/Index', [
            'collection' => MuscleGroupResource::collection(MuscleGroupTable::query()->paginate()),
        ]);
    }

    public function create()
    {
        return MuscleGroupResource::collection(MuscleGroup::all());
        return Inertia::render('@health/muscleGroups/Create', [
            'muscle_groups' => MuscleGroupResource::collection(MuscleGroup::all()),
        ]);
    }

    public function store(SaveRequest $request)
    {
        $muscleGroup = MuscleGroup::create($request->validated());

        return to_route('health.workouts.muscle-groups.edit', ['muscle_group' => $muscleGroup]);
    }

    public function edit(MuscleGroup $muscleGroup)
    {
        return Inertia::render('@health/workouts/muscleGroups/Edit', [
            'resource' => MuscleGroupResource::make($muscleGroup),
        ]);
    }

    public function update(SaveRequest $request, MuscleGroup $muscleGroup)
    {
        $muscleGroup->update($request->validated());

        return back();
    }

    public function destroy(MuscleGroup $muscleGroup)
    {
        $muscleGroup->delete();

        return back();
    }
}
