<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            WebsiteSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            MenuSeeder::class,
            PageSeeder::class,
            PropertyCategorySeeder::class,
            PropertyTypeSeeder::class,
            PurposeSeeder::class,
            RoadTypeSeeder::class,
            SliderSeeder::class,
            UnitSeeder::class,
            FeatureSeeder::class,
            AmenitySeeder::class,
            CitySeeder::class
        ]);
    }
}
