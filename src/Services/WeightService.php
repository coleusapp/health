<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\WeightData;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Facades\Settings;
use Coleus\Health\Models\Weight;
use Coleus\Support\Services\Service;

class WeightService extends Service
{
    protected $model = Weight::class;

    protected $data = WeightData::class;

    public function default(): Weight
    {
        $default = Weight::latest('created_at')->first() ?? new Weight(['unit' => Settings::get('weight_unit', WeightEnum::LBS->value), 'weight' => 1]);
        $default->date = now(Settings::get('timezone', 'UTC'));

        return $default;
    }
}
