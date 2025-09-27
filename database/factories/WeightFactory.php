<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Enums\WeightEnum;
use Coleus\Health\Models\Weight;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightFactory extends Factory
{
    protected $model = Weight::class;

    public function definition(): array
    {
        return [
            'weight' => $this->faker->randomFloat(2, 10, 1000),
            'unit' => $this->faker->randomElement(WeightEnum::cases())->value,
            'date' => $this->faker->date(),
        ];
    }
}
