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
        $unit = $this->faker->randomElement(WeightEnum::cases());

        return [
            'weight' => $unit === WeightEnum::KG
                ? $this->faker->randomFloat(1, 50, 120)
                : $this->faker->randomFloat(1, 110, 265),
            'unit' => $unit->value,
            'date' => $this->faker->dateTimeBetween('-3 months', 'now'),
        ];
    }
}
