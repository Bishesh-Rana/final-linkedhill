<?php

namespace Database\Factories;

use App\Models\TradelinkWebsite;
use Illuminate\Database\Eloquent\Factories\Factory;

class TradelinkWebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = TradelinkWebsite::class;
    public function definition()
    {
        return [
            'logo' =>'rsz_logo.png',
            'email' => 'info@tradelink.com',
            'website_title' =>'Tradelink',
            'copyright_message' => 'Copyright © 2022 Tradelink, All Rights Reserved.',
            'phone' => '9876567456',
            'short_description' => 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown.',
        ];
    }
}
