<?php

namespace Coleus\Health\Data;

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
