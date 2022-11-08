<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purposes')->insert(
            [
                [
                    'name' => 'Rent',
                ],
                [
                    'name' => 'Sale',
                ],

                [
                    'name' => 'Lease',

                ],

            ]);
    }
}
