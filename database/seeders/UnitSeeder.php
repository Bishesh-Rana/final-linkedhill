<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert(
            [
                [
                    'name' => 'Aana',
                ],
                [
                    'name' => 'Paisa',
                ],

                [
                    'name' => 'Ropani',

                ],
                [
                    'name' => 'Sq. Feet',

                ],
                [
                    'name' => 'Sq. Meter',

                ],
                [
                    'name' => 'Ropani',

                ],
                [
                    'name' => 'Acres',

                ],

            ]);
    }
}
