<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('road_types')->insert(
            [
                [
                    'name' => 'Paved',
                ],
                [
                    'name' => 'Black Topped',
                ],

                [
                    'name' => 'Alley',

                ],

            ]);

        // DB::table('cities')->insert(
        //     [
        //         [
        //             'name' => 'Kathmandu',
        //             'slug' =>'kathmandu',
        //             'district' =>'Kathmandu',
        //         ],
        //     ]);

        // $city = City::all();
        // DB::table('areas')->insert(
        //     [
        //         [
        //             'city_id' => 1,
        //             'name' => 'Lazimpat',
        //             'slug' =>'lazimpat'
        //         ],
        //     ]);
    }
}
