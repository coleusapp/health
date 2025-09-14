<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Http\Requests\MuscleGroup\SaveRequest;
use Coleus\Health\Http\Resources\MuscleGroupAsOptionResource;
use Coleus\Health\Http\Resources\MuscleGroupResource;
use Coleus\Health\Models\MuscleGroup;
use Coleus\Health\Services\MuscleGroupService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class MuscleGroupController extends Controller
{
    public function index(): Response
    {
        $collection = MuscleGroupService::indexQuery()
            ->paginate();

        return Inertia::render('muscleGroups/Index', [
            'collection' => MuscleGroupResource::collection($collection),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('muscleGroups/Create', [
            'muscle_groups' => MuscleGroupAsOptionResource::collectionWithNull(MuscleGroup::get()),
        ]);
    }

    public function store(SaveRequest $request): RedirectResponse
    {
        $muscleGroup = MuscleGroup::create($request->validated());

        return to_route('health.muscle-groups.edit', ['muscle_group' => $muscleGroup]);
    }

    public function edit(MuscleGroup $muscleGroup): Response
    {
        return Inertia::render('muscleGroups/Edit', [
            'resource' => MuscleGroupResource::make($muscleGroup),
            'muscle_groups' => MuscleGroupAsOptionResource::collectionWithNull(MuscleGroup::get()),
        ]);
    }

    public function update(SaveRequest $request, MuscleGroup $muscleGroup): RedirectResponse
    {
        $muscleGroup->update($request->validated());

        return back();
    }

    public function destroy(MuscleGroup $muscleGroup): RedirectResponse
    {
        $muscleGroup->delete();

        return back();
    }
}
