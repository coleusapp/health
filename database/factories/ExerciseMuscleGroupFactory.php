<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\ExerciseMuscleGroup;
use Coleus\Health\Models\MuscleGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseMuscleGroupFactory extends Factory
{
    protected $model = ExerciseMuscleGroup::class;

    public function definition(): array
    {
        return [
            'exercise_id' => Exercise::factory(),
            'muscle_group_id' => MuscleGroup::factory(),
        ];
    }
}
