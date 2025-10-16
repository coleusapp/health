<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\OralCareData;
use Coleus\Health\Models\OralCare;
use Coleus\Support\Services\Service;
use Illuminate\Support\Facades\DB;

class OralCareService extends Service
{
    protected $data = OralCareData::class;

    protected $model = OralCare::class;

    protected static function save(array $data, ?OralCare $oralCare = null): OralCare
    {
        if ($oralCare) {
            $oralCare->update($data);
        } else {
            $oralCare = OralCare::create($data);
        }

        DB::transaction(function () use ($oralCare, $data) {
            $oralCare->toothpastes()->detach();
            collect($data['toothpastes'] ?? [])
                ->each(function ($toothpaste) use ($oralCare) {
                    $oralCare->toothpastes()->attach($toothpaste['toothpaste_id']);
                });
        });

        return $oralCare;
    }

    public function default(): OralCare
    {
        $default = OralCare::latest('date')->first() ?? new OralCare();
        $default->date = now(config('app.timezone'));

        return $default;
    }
}
