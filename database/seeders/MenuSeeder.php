<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert(
            [
                [
                    'parent_id' => null,
                    'name' => 'Home',
                    'slug' => '',
                    'order' => 1,
                    'url' => '',
                    'active' => 1,
                    'type' => 'home',
                    'show' => '["header"]',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',
                ],
                [
                    'parent_id' => null,
                    'name' => 'About Us',
                    'slug' => 'about-us',
                    'order' => 2,
                    'url' => '',
                    'active' => 1,
                    'type' => 'about',
                    'show' => '["header"]',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',

                ],

                [
                    'parent_id' => null,
                    'name' => 'Property',
                    'slug' => 'properties',
                    'order' => 3,
                    'url' => '',
                    'active' => 1,
                    'show' => '["header"]',
                    'type' => 'property',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',


                ],
                [
                    'parent_id' => null,
                    'name' => 'Blogs',
                    'slug' => 'blogs',
                    'order' => 4,
                    'url' => '',
                    'active' => 1,
                    'type' => 'blog',
                    'show' => '["header"]',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',


                ],
                [
                    'parent_id' => null,
                    'name' => 'News',
                    'slug' => 'news',
                    'order' => 5,
                    'url' => '',
                    'active' => 1,
                    'type' => 'news',
                    'show' => '["header"]',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',


                ],
                [
                    'parent_id' => null,
                    'name' => 'Contact Us',
                    'slug' => 'contact-us',
                    'order' => 6,
                    'url' => '',
                    'active' => 1,
                    'type' => 'contact',
                    'show' => '["header"]',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',

                ],
                [
                    'parent_id' => null,
                    'name' => 'Our Services',
                    'slug' => 'our-services',
                    'order' => 7,
                    'url' => '',
                    'active' => 1,
                    'type' => 'service',
                    'show' => '["header"]',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',
                ],
                [
                    'parent_id' => null,
                    'name' => 'Privacy & Policy',
                    'slug' => 'privacy-policy',
                    'order' => 8,
                    'url' => '',
                    'active' => 1,
                    'type' => 'basic',
                    'show' => '["footer"]',
                    'image' => 'https://source.unsplash.com/XbwHrt87mQ0',
                ]
            ]
        );
    }
}
