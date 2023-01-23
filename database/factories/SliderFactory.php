<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Slider::class;
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'url' => $this->faker->name(),
            'image' => $this->faker->image(),
        ];
    }
}
