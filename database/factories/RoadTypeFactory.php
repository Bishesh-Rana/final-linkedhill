<?php

namespace Database\Factories;

use App\Models\RoadType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoadTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = RoadType::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
