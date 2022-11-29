<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TradelinkCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'order' => rand(1,5),
            'description' => $this->faker->sentence(20),
        ];
    }
}
