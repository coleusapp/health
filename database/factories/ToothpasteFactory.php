<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Models\Toothpaste;
use Illuminate\Database\Eloquent\Factories\Factory;

class ToothpasteFactory extends Factory
{
    protected $model = Toothpaste::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([
                'Colgate Total', 'Colgate Sensitive Pro-Relief', 'Colgate Optic White',
                'Sensodyne Pronamel', 'Sensodyne Repair & Protect', 'Sensodyne Fresh Mint',
                'Oral-B Pro-Expert', 'Oral-B 3D White',
                'Crest Pro-Health', 'Crest Gum Detoxify',
                'Arm & Hammer Advanced White', 'Arm & Hammer Extra Whitening',
                "Tom's of Maine Fluoride-Free", "Tom's of Maine Whitening",
                'Aquafresh Triple Protection',
            ]),
        ];
    }
}
