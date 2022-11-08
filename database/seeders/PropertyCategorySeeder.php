<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('property_categories')->insert(
            [
                [
                    'name' => 'House',
                    'slug' => 'house',
                    'image' => 'https://source.unsplash.com/178j8tJrNlc'

                ],
                [
                    'name' => 'Land',
                    'slug' => 'land',
                    'image' => 'https://source.unsplash.com/sYffw0LNr7s'

                ],

                [
                    'name' => 'Apartment',
                    'slug' => 'apartment',
                    'image' => 'https://source.unsplash.com/3wylDrjxH-E'



                ],
                [
                    'name' => 'Flat',
                    'slug' => 'flat',
                    'image' => 'https://source.unsplash.com/3wylDrjxH-E'



                ],
                [
                    'name' => 'Business',
                    'slug' => 'business',
                    'image' => 'https://source.unsplash.com/PhYq704ffdA'



                ],
                [
                    'name' => 'Shop Space',
                    'slug' => 'shop-space',
                    'image' => 'https://source.unsplash.com/c9FQyqIECds'



                ],
                [
                    'name' => 'Hostel',
                    'slug' => 'hostel',
                    'image' => 'https://source.unsplash.com/8TrcnRMap90'



                ],
                [
                    'name' => 'Office Space',
                    'slug' => 'office_space',
                    'image' => 'https://source.unsplash.com/VWcPlbHglYc'

                ],

            ]
        );

        DB::table('service_categories')->insert([
            'name' => 'service  Category',
            'slug' => 'service-category',
            'image' => 'https://source.unsplash.com/VWcPlbHglYc',
        ]);
    }
}
