<?php

namespace Coleus\Health\Http\Controllers;

use App\Http\Controllers\Controller;
use Coleus\Health\Facades\Health;
use Coleus\Health\Http\Requests\OralCareRequest;
use Coleus\Health\Http\Resources\ToothpasteAsOptionResource;
use Coleus\Health\Http\Resources\OralCareResource;
use Coleus\Health\Models\OralCare;
use Coleus\Health\Models\Toothpaste;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class OralCareController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('oralCares/Index', [
            'collection' => OralCareResource::collection(Health::oralCare()->index()),
        ]);
    }

    public function create(): Response
    {
        $default = OralCare::latest('date')->first() ?? new OralCare();
        $default->date = now('America/Denver');

        return Inertia::render('oralCares/Create', [
            'resource' => OralCareResource::make($default->load('toothpastes')),
            'toothpastes' => ToothpasteAsOptionResource::collectionWithNull(Toothpaste::get()),
        ]);
    }

    public function store(OralCareRequest $request): RedirectResponse
    {
        return to_route('health.oral-cares.edit', [
            'oral_care' => Health::oralCare()->store($request->validated()),
        ]);
    }

    public function edit(OralCare $oralCare): Response
    {
        return Inertia::render('oralCares/Edit', [
            'resource' => OralCareResource::make($oralCare->load('toothpastes')),
            'toothpastes' => ToothpasteAsOptionResource::collectionWithNull(Toothpaste::get()),
        ]);
    }

    public function update(OralCareRequest $request, OralCare $oralCare): RedirectResponse
    {
        Health::oralCare()->update($oralCare, $request->validated());

        return back();
    }

    public function destroy(OralCare $oralCare): RedirectResponse
    {
        Health::oralCare()->destroy($oralCare);

        return back();
    }
}
