<?php

namespace Database\Factories;

use App\Models\PropertyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = PropertyCategory::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->name(),
            'image' => $this->faker->image(),
        ];
    }
}
