<?php

namespace Coleus\Health\Data;

use Spatie\LaravelData\Data;

class OralCareData extends Data
{
    public function __construct(
        public string $date,
        public int $duration,
        public bool $brushed,
        public bool $flossed,
        public bool $fluoride_taken,
    )
    {
        //
    }
}
