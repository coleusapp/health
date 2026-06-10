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
        $exercises = [
            'Bench Press' => 'Compound push movement targeting the pectorals, performed with a barbell.',
            'Incline Dumbbell Press' => 'Pressing movement on an incline bench targeting the upper pectorals.',
            'Back Squat' => 'Lower body compound movement targeting quads, glutes, and hamstrings.',
            'Deadlift' => 'Full-body compound pull from the floor, emphasising the posterior chain.',
            'Romanian Deadlift' => 'Hip-hinge movement primarily targeting the hamstrings and glutes.',
            'Pull-Up' => 'Bodyweight vertical pull targeting the lats and upper back.',
            'Push-Up' => 'Bodyweight pressing movement targeting the chest, shoulders, and triceps.',
            'Overhead Press' => 'Vertical push movement targeting the shoulders and triceps.',
            'Barbell Row' => 'Horizontal pull targeting the back muscles with a barbell.',
            'Lat Pulldown' => 'Cable pull-down targeting the lats and upper back.',
            'Seated Cable Row' => 'Horizontal cable pull developing mid-back thickness.',
            'Leg Press' => 'Machine-based lower body push targeting the quads and glutes.',
            'Leg Curl' => 'Machine isolation exercise targeting the hamstrings.',
            'Leg Extension' => 'Machine isolation exercise targeting the quadriceps.',
            'Hip Thrust' => 'Glute-dominant hip extension performed with a barbell.',
            'Lateral Raise' => 'Isolation movement targeting the lateral deltoids.',
            'Face Pull' => 'Cable exercise targeting the rear delts and external rotators.',
            'Bicep Curl' => 'Isolation movement for the biceps brachii.',
            'Hammer Curl' => 'Neutral-grip curl targeting the biceps and brachialis.',
            'Tricep Pushdown' => 'Cable isolation exercise targeting the triceps.',
            'Skull Crusher' => 'Barbell or dumbbell tricep isolation performed lying flat.',
            'Plank' => 'Isometric core stabilisation exercise.',
            'Crunches' => 'Core exercise targeting the rectus abdominis.',
            'Russian Twist' => 'Rotational core exercise targeting the obliques.',
            'Hanging Leg Raise' => 'Core exercise targeting the lower abdominals while hanging from a bar.',
            'Lunges' => 'Unilateral lower body exercise targeting the quads and glutes.',
            'Box Jump' => 'Plyometric exercise developing explosive lower body power.',
            'Burpee' => 'Full-body conditioning exercise combining a squat, plank, and jump.',
            'Running' => 'Aerobic cardiovascular exercise performed at a sustained pace.',
            'Cycling' => 'Low-impact aerobic exercise targeting the lower body.',
            'Rowing' => 'Full-body aerobic exercise using a rowing machine.',
            'Jump Rope' => 'High-intensity cardiovascular exercise using a skipping rope.',
        ];

        $name = $this->faker->randomElement(array_keys($exercises));

        return [
            'name' => $name,
            'description' => $exercises[$name],
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
