<?php

namespace Coleus\Health\Data;

use Coleus\Health\Casts\TimezoneDatetimeCast;
use Coleus\Health\Enums\WeightEnum;
use DateTime;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class WeightData extends Data
{
    public function __construct(
        public float $weight,
        public WeightEnum $unit,
        public string $date,
    )
    {
        //
    }
}
