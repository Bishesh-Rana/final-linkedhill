<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            [
                'name' => 'Gym',
                'slug' => 'gym'
            ],
            [
                'name' => 'School',
                'slug' => 'school'
            ],
            [
                'name' => 'church',
                'slug' => 'church'
            ],
            [
                'name' => 'park',
                'slug' => 'park'
            ],
        ];

        DB::table('amenities')->insert($amenities);
    }
}
