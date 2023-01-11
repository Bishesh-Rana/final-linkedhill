<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Page::class;
    public function definition()
    {
        return [

            'name' => $this->faker->name(),
            'slug' => $this->faker->name(),
            'description' => $this->faker->name(),
            'meta_keyword' => $this->faker->name(),
            'meta_description' => $this->faker->name(),

        ];
    }
}
