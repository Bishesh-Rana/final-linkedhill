<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_category_id' => 1,
            'name' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'feature' => $this->faker->boolean(),
            'description' => $this->faker->sentence(20),
        ];
    }
}
