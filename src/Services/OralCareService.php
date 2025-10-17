<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\OralCareData;
use Coleus\Health\Models\OralCare;
use Coleus\Support\Services\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OralCareService extends Service
{
    protected $data = OralCareData::class;

    protected $model = OralCare::class;

    protected static function save(array $payload, ?Model $model = null): OralCare
    {
        if ($model) {
            $model->update($payload);
        } else {
            $model = OralCare::create($payload);
        }

        DB::transaction(function () use ($model, $payload) {
            $model->toothpastes()->detach();
            collect($payload['toothpastes'] ?? [])
                ->each(function ($toothpaste) use ($model) {
                    $model->toothpastes()->attach($toothpaste['toothpaste_id']);
                });
        });

        return $model;
    }

    public function default(): OralCare
    {
        $default = OralCare::latest('date')->first() ?? new OralCare();
        $default->date = now(config('app.timezone'));

        return $default;
    }
}
