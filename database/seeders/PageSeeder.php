<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert(
            [
                [
                    'name' => 'Our Company',
                    'slug' =>'our-company',
                    'description' =>'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ',
                    'meta_keyword' => 'keyword',
                    'meta_description'=>'description'
                ],
                [
                    'name' => 'Policies',
                    'slug' =>'policies',
                    'description' =>'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ',
                    'meta_keyword' => 'keyword',
                    'meta_description'=>'description'
                ],

                [
                    'name' => 'Terms & Conditions',
                    'slug' =>'terms-and-conditions',
                    'description' =>'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ',
                    'meta_keyword' => 'keyword',
                    'meta_description'=>'description'

                ],
                [
                    'name' => 'About Us',
                    'slug' =>'about-us',
                    'description' =>'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. ',
                    'meta_keyword' => 'keyword',
                    'meta_description'=>'description'

                ],


            ]);
    }
}
