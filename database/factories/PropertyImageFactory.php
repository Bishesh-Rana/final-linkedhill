<?php

namespace Database\Factories;

use App\Models\PropertyImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyImageFactory extends Factory
{
    protected $model = PropertyImage::class;

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
            'name' => $images[array_rand($images)],
            'user_id' => 1,
            'property_id' => 1,
        ];
    }
}
