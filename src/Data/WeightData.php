<?php

namespace Coleus\Health\Data;

use Coleus\Health\Enums\WeightEnum;
use Spatie\LaravelData\Data;

class WeightData extends Data
{
    public function __construct(
        public float $weight,
        public WeightEnum $unit,
        public string $date,
    ) {
        //
    }
}
