<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert(
            [
                [
                    'name' => 'Residential',
                    'slug' => 'residential',
                ],
                [
                    'name' => 'Commercial',
                    'slug' => 'commercial',
                ],

                [
                    'name' => 'Agriculture',
                    'slug' => 'agriculture',

                ],

            ]);
    }
}
