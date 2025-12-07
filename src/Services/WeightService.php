<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\WeightData;
use Coleus\Health\Models\Weight;
use Coleus\Health\Settings\GeneralSettings;
use Coleus\Support\Services\Service;

class WeightService extends Service
{
    protected $model = Weight::class;

    protected $data = WeightData::class;

    public function default(): Weight
    {
        $default = Weight::latest('created_at')->first() ?? new Weight(['weight' => 1, 'unit' => app(GeneralSettings::class)->weight_unit]);
        $default->date = now(app(GeneralSettings::class)->timezone);

        return $default;
    }
}
