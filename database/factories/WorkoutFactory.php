<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Models\Workout;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkoutFactory extends Factory
{
    protected $model = Workout::class;

    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
