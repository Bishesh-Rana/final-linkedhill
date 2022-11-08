<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->bs(),
            'type' => $this->faker->boolean() ? 1 : 2,
            'position' => $this->faker->boolean() ? 1 : 2,
            'image' => $this->faker->image()
        ];
    }
}
