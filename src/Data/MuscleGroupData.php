<?php

namespace Coleus\Health\Data;

use Spatie\LaravelData\Data;

class MuscleGroupData extends Data
{
    public function __construct(
        public string $name,
        public ?string $description,
        public ?int $muscle_group_id,
    )
    {
        //
    }
}
