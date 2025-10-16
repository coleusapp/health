<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\WeightData;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Models\Weight;
use Coleus\Support\Services\Service;
use Inertia\Inertia;

class WeightService extends Service
{
    protected $model = Weight::class;

    protected $data = WeightData::class;

    public function default(): Weight
    {
        $default = Weight::latest('created_at')->first() ?? new Weight(['weight' => 1]);
        $default->date = now(config('app.timezone'));

        return $default;
    }
}
