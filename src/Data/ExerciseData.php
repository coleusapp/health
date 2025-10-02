<?php

namespace Coleus\Health\Data;

use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Spatie\LaravelData\Data;

class ExerciseData extends Data
{
    public function __construct(
        public string $name,
        public ?string $description,
        public ?bool $has_rep,
        public ?bool $has_weight,
        public ?WeightEnum $weight_unit,
        public ?bool $has_distance,
        public ?DistanceEnum $distance_unit,
        public ?bool $has_calorie,
        public ?CalorieEnum $calorie_unit,
        public ?bool $has_duration,
        public ?DurationEnum $duration_unit,
    )
    {
        //
    }
}
