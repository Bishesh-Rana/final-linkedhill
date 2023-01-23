<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\PropertyCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category  = PropertyCategory::all()->pluck('id')->toArray();

        // Feature::factory()->count(10)->create()
        //     ->each(function ($feature) use ($category) {
        //         $feature->category()->sync(array_slice($category, rand(0, count($category)-1)));
        //     });
        DB::table('features')->insert([
            [
            'title' => 'Bedroom',
            'type' => '1',
            ],
            [
            'title' => 'Bathroom',
            'type' => '1',
            ],
            [
            'title' => 'Parking',
            'type' => '1',
            ]

        ]);
    }
}
