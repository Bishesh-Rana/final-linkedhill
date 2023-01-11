<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'https://source.unsplash.com/XbwHrt87mQ0',
            'https://source.unsplash.com/z9fFOzL5L_Y',
            'https://source.unsplash.com/ITzfgP77DTg',
            'https://source.unsplash.com/sBjIRDC0H5Q',
            'https://source.unsplash.com/wtzOhxEX4WU',
            'https://source.unsplash.com/2zfL4pyw3pY',
        ];
        return [
            'type' => $this->faker->boolean() ? 'blog' : 'news',
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence(),
            'sub_title' => $this->faker->sentence(),
            'image' => $images[array_rand($images)],
            'description' => $this->faker->text(400),
            'meta_keyword' => $this->faker->sentence(),
            'meta_description' => $this->faker->sentence(),
            'featured' => true,
        ];
    }
}
