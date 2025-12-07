<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Facades\Health;
use Coleus\Health\Http\Requests\MuscleGroup\MuscleRequest;
use Coleus\Health\Http\Resources\MuscleGroupResource;
use Coleus\Health\Models\MuscleGroup;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class MuscleGroupController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('muscleGroups/Index', [
            'collection' => MuscleGroupResource::collection(Health::muscleGroup()->index()),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('muscleGroups/Create', [
            'muscle_groups' => Health::muscleGroup()->options(),
        ]);
    }

    public function store(MuscleRequest $request): RedirectResponse
    {
        return to_route('health.muscle-groups.edit', [
            'muscle_group' => Health::muscleGroup()->store($request->validated()),
        ]);
    }

    public function edit(MuscleGroup $muscleGroup): Response
    {
        return Inertia::render('muscleGroups/Edit', [
            'resource' => MuscleGroupResource::make($muscleGroup),
            'muscle_groups' => Health::muscleGroup()->options(),
        ]);
    }

    public function update(MuscleRequest $request, MuscleGroup $muscleGroup): RedirectResponse
    {
        Health::muscleGroup()->update($muscleGroup, $request->validated());

        return back();
    }

    public function destroy(MuscleGroup $muscleGroup): RedirectResponse
    {
        Health::muscleGroup()->destroy($muscleGroup);

        return back();
    }
}
