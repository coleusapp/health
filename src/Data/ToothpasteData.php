<?php

namespace Coleus\Health\Data;

use Coleus\Health\Enums\WeightEnum;
use Spatie\LaravelData\Data;

class ToothpasteData extends Data
{
    public function __construct(
        public string $name,
    )
    {
        //
    }
}
