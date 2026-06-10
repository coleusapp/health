<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Models\MuscleGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class MuscleGroupFactory extends Factory
{
    protected $model = MuscleGroup::class;

    public function definition(): array
    {
        $muscleGroups = [
            'Chest' => 'Upper body pushing muscles including the pectorals.',
            'Back' => 'Collection of muscles spanning the posterior torso.',
            'Shoulders' => 'Deltoid complex responsible for shoulder abduction and rotation.',
            'Arms' => 'Biceps, triceps, and forearm muscles of the upper limb.',
            'Core' => 'Stabilising muscles of the trunk and spine.',
            'Legs' => 'Lower body muscles including quads, hamstrings, and calves.',
            'Glutes' => 'Gluteal muscles responsible for hip extension and abduction.',
            'Pectoralis Major' => 'Primary chest muscle responsible for horizontal pressing movements.',
            'Latissimus Dorsi' => 'Broad back muscle responsible for shoulder adduction and pulling movements.',
            'Trapezius' => 'Large diamond-shaped muscle spanning the upper back and neck.',
            'Rhomboids' => 'Mid-back muscles that retract and stabilise the scapula.',
            'Anterior Deltoid' => 'Front portion of the deltoid, engaged during pressing and front raises.',
            'Lateral Deltoid' => 'Middle portion of the deltoid, targeted by lateral raises.',
            'Posterior Deltoid' => 'Rear portion of the deltoid, targeted by face pulls and rows.',
            'Biceps Brachii' => 'Two-headed elbow flexor on the front of the upper arm.',
            'Triceps Brachii' => 'Three-headed elbow extensor on the back of the upper arm.',
            'Forearms' => 'Lower arm muscles controlling wrist flexion, extension, and grip.',
            'Rectus Abdominis' => 'The primary abdominal muscle running vertically along the midline.',
            'Obliques' => 'Side abdominal muscles responsible for trunk rotation and lateral flexion.',
            'Transverse Abdominis' => 'Deep core muscle acting as the body\'s natural weight belt.',
            'Quadriceps' => 'Four-headed muscle on the front of the thigh, extending the knee.',
            'Hamstrings' => 'Posterior thigh muscles responsible for knee flexion and hip extension.',
            'Gluteus Maximus' => 'Largest gluteal muscle, the primary driver of hip extension.',
            'Gluteus Medius' => 'Hip abductor stabilising the pelvis during gait.',
            'Hip Flexors' => 'Muscles responsible for lifting the thigh toward the torso.',
            'Calves' => 'Gastrocnemius and soleus muscles of the lower leg.',
        ];

        $name = $this->faker->randomElement(array_keys($muscleGroups));

        return [
            'name' => $name,
            'description' => $muscleGroups[$name],
            'muscle_group_id' => $this->faker->randomElement([
                null,
                MuscleGroup::factory(),
            ]),
        ];
    }

    public function withParent(): static
    {
        return $this->state(fn () => [
            'muscle_group_id' => MuscleGroup::factory(),
        ]);
    }

    public function withoutParent(): static
    {
        return $this->state(fn () => [
            'muscle_group_id' => null,
        ]);
    }
}
