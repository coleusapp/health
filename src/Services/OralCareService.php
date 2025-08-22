<?php

namespace Coleus\Health\Services;

use Coleus\Health\Http\Requests\OralCareRequest;
use Coleus\Health\Models\OralCare;
use Illuminate\Support\Facades\DB;

class OralCareService
{
    public static function indexQuery()
    {
        return OralCare::orderBy('date', 'desc');
    }

    public static function save(OralCareRequest $request, ?OralCare $oralCare = null): OralCare
    {
        if ($oralCare) {
            $oralCare->update($request->validated());
        } else {
            $oralCare = OralCare::create($request->validated());
        }

        DB::transaction(function () use ($oralCare, $request) {
            $oralCare->toothpastes()->detach();
            collect($request->validated('toothpastes'))
                ->each(function ($toothpaste) use ($oralCare) {
                    $oralCare->toothpastes()->attach($toothpaste['toothpaste_id']);
                });
        });

        return $oralCare;
    }
}