<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Admin::class;

    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@linkedhill.com',
            'password' => bcrypt('admin@linkedhill.com'),
            'mobile' => '9898989898',
            'featured_image' => 'placeholder.jpg'
        ];
    }
}
