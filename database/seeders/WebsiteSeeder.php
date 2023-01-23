<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\PropertyCategory;
use App\Models\Purpose;
use App\Models\RoadType;
use App\Models\Type;
use App\Models\Unit;
use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::create([
            'name' => 'linkedHill',
            'logo' => asset('images/rsz_logo.png'),
            'logo_footer' => asset('images/rsz_logo.png'),
            'favicon' => asset('images/rsz_logo.png'),
            'email' => 'linkedHill@gmail.com',
            'alternate_email' => 'linkedHill@gmail.com',
            'phone' => '123456',
            'currency' => '123',
            'fb_url' => 'https://www.facebook.com',
            'twitter_url' => 'https://www.twitter.com',
            'instagram_url' => 'https://www.instagram.com',
            'youtube_url' => 'https://www.youtube.com',
            'playstore_url' => 'https://www.playstore.com',
            'appstore_url' => 'https://www.appstore.com',
            'short_intro' => 'linkedHill',
            'map_url' => 'linkedHill',
            'short_description' => 'linkedHill',
            'meta_title' => 'linkedHill',
            'meta_keyword' => 'linkedHill',
            'meta_description' => 'linkedHill',
            'address' => 'linkedHill',
            'og_image' => 'https://www.facebook.com',
        ]);
    }
}
