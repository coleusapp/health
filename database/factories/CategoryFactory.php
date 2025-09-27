<?php

namespace Coleus\Health\Database\Factories;

use Coleus\Health\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
        ];
    }
}
