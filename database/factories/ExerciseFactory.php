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

    public function allTrue(): static
    {
        return $this->state(fn (array $attributes) => [
            'has_rep' => true,
            'has_weight' => true,
            'has_distance' => true,
            'has_calorie' => true,
            'has_duration' => true,
        ]);
    }

    public function allFalse(): static
    {
        return $this->state(fn (array $attributes) => [
            'has_rep' => false,
            'has_weight' => false,
            'has_distance' => false,
            'has_calorie' => false,
            'has_duration' => false,
        ]);
    }
}
