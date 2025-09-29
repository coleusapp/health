<?php

namespace Coleus\Health\Data;

use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public string $name,
    )
    {
        //
    }
}
