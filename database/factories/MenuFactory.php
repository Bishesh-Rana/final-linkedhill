<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Menu::class;
    public function definition()
    {
        return [
            'parent_id' => null,
            'name' => $this->faker->name(),
            'slug' => $this->faker->name(),
            'url' => $this->faker->name(),
            'order' => $this->faker->numberBetween(1,100),
            'active' => 1,
        ];
    }
}
