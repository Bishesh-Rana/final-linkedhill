<?php

namespace Database\Factories;

use App\Models\TradelinkAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

class TradelinkAdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = TradelinkAdmin::class;

    public function definition()
    {
        return [
            'name' => 'Admin',
            'user_type' =>'admin',
            'email' => 'admin@tradelink.com',
            'password' => bcrypt('admin@tradelink.com'),
            'image' =>'default-tradelink-admin.jpg'
        ];
    }
}
