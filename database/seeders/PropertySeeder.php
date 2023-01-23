<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        Property::factory()->count(50)->create()
            ->each(function ($property) {
                $property->images()->saveMany(PropertyImage::factory()->count(5)->create());
                $property->features()->save(Feature::factory()->create());
            });
    }
}
