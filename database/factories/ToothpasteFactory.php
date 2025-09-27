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
            'name' => $this->faker->word(),
        ];
    }
}
