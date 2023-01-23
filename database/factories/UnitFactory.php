<?php

namespace Database\Factories;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Unit::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
