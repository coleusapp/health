<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Models\MuscleGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class MuscleGroupFactory extends Factory
{
    protected $model = MuscleGroup::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'muscle_group_id' => $this->faker->randomElement([
                null,
                MuscleGroup::factory(),
            ]),
        ];
    }

    public function withParent()
    {
        return $this->state(fn() => [
            'muscle_group_id' => MuscleGroup::factory(),
        ]);
    }
}
