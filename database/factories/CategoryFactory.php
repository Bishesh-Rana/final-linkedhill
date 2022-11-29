<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->boolean() ? 'news' : 'blog',
            'name' => $this->faker->title(),
            'slug' => $this->faker->slug(),
        ];
    }
}
