<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Enums\CalorieEnum;
use Coleus\Health\Enums\DistanceEnum;
use Coleus\Health\Enums\DurationEnum;
use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    protected $model = Exercise::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'has_rep' => $this->faker->boolean(),
            'has_weight' => $this->faker->boolean(),
            'weight_unit' => $this->faker->randomElement(WeightEnum::cases())->value,
            'has_distance' => $this->faker->boolean(),
            'distance_unit' => $this->faker->randomElement(DistanceEnum::cases())->value,
            'has_calorie' => $this->faker->boolean(),
            'calorie_unit' => $this->faker->randomElement(CalorieEnum::cases())->value,
            'has_duration' => $this->faker->boolean(),
            'duration_unit' => $this->faker->randomElement(DurationEnum::cases())->value,
        ];
    }
}
