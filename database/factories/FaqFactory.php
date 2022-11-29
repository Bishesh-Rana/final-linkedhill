<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaqFactory extends Factory
{

    protected $model = Faq::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question' => $this->faker->sentence(),
            'answer' => $this->faker->sentence(),
            'meta_keyword' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(),
            'featured' => 1,
        ];
    }
}
