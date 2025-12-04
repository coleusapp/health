<?php

namespace Coleus\Health\Data;

use Coleus\Health\Enums\WeightEnum;
use Spatie\LaravelData\Data;

class WorkoutData extends Data
{
    public function __construct(
        public string $date,
    )
    {
        //
    }
}
