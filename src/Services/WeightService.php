<?php

namespace Coleus\Health\Services;

use Coleus\Health\Data\WeightData;
use Coleus\Health\Models\Weight;
use Coleus\Support\Services\Service;

class WeightService extends Service
{
    protected $model = Weight::class;

    protected $data = WeightData::class;
}
