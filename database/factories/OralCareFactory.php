<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Models\OralCare;
use Illuminate\Database\Eloquent\Factories\Factory;

class OralCareFactory extends Factory
{
    protected $model = OralCare::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'duration' => $this->faker->numberBetween(1, 5),
            'brushed' => $this->faker->boolean(),
            'flossed' => $this->faker->boolean(),
            'fluoride_taken' => $this->faker->boolean(),
        ];
    }
}
