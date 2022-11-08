<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TradelinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            "address" => $this->faker->streetAddress(),
            "phone" => (int) $this->faker->e164PhoneNumber(),
            "email" =>$this->faker->unique()->safeEmail(),
            'category_id' => rand(1,5),
            'description' => $this->faker->sentence(20),
        ];
    }
}
