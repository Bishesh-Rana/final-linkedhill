<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert(
            [
                [
                    'title' => 'Slider First',
                    'url' => 'https://linkedhill.com/',
                    'image'=>'https://source.unsplash.com/XbwHrt87mQ0',
                    'hide' => true
                ],
                [
                    'title' => 'Slider Second',
                    'url' => 'https://linkedhill.com/',
                    'image'=>'https://source.unsplash.com/Bkp3gLygyeA',
                    'hide' => true
                ],

                [
                    'title' => 'Slider Third',
                    'url' => 'https://linkedhill.com/',
                    'image'=>'https://source.unsplash.com/xQWLtlQb7L0',
                    'hide' => true
                ],

            ]);
    }
}
