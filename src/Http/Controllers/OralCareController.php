<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Http\Requests\OralCareRequest;
use Coleus\Health\Http\Resources\ToothpasteAsOptionResource;
use Coleus\Health\Http\Resources\OralCareResource;
use Coleus\Health\Models\OralCare;
use Coleus\Health\Models\Toothpaste;
use Coleus\Health\Services\OralCareService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class OralCareController extends Controller
{
    public function index(): Response
    {
        $collection = OralCareService::indexQuery()
            ->paginate();

        return Inertia::render('@health/oralCares/Index', [
            'collection' => OralCareResource::collection($collection),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('@health/oralCares/Create', [
            'toothpastes' => ToothpasteAsOptionResource::collectionWithNull(Toothpaste::get()),
        ]);
    }

    public function store(OralCareRequest $request): RedirectResponse
    {
        $oralCare = OralCareService::save($request);

        return to_route('health.oral-cares.edit', ['oral_care' => $oralCare]);
    }

    public function edit(OralCare $oralCare): Response
    {
        return Inertia::render('@health/oralCares/Edit', [
            'resource' => OralCareResource::make($oralCare->load('toothpastes')),
            'toothpastes' => ToothpasteAsOptionResource::collectionWithNull(Toothpaste::get()),
        ]);
    }

    public function update(OralCareRequest $request, OralCare $oralCare): RedirectResponse
    {
        OralCareService::save($request, $oralCare);

        return back();
    }

    public function destroy(OralCare $oralCare): RedirectResponse
    {
        $oralCare->delete();

        return back();
    }
}
