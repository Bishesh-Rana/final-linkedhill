<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Website::class;
    public function definition()
    {
        return [
            'logo' =>'rsz_logo.png',
            'email' => 'info@linkedhill.com',
            'alternate_email' => 'enquiries@gmail.com',
            'phone' => '9898989898',
            'address' => 'Abc Street Kathmandu Nepal',
            'currency' => 'NPR',
        ];
    }
}
