<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{

    private function cities()
    {
        $path = resource_path("js/json/cities.json"); // ie: /var/www/laravel/app/storage/json/filename.json

        return json_decode(file_get_contents($path), true);
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            'https://source.unsplash.com/L4NA2qRqK0s',
            'https://source.unsplash.com/xyE1p1rG04U',
            'https://source.unsplash.com/Wj9ELwGXa6c',
            'https://source.unsplash.com/2Q2dpVPY6XU',
            'https://source.unsplash.com/KKm1ua7MSf0',
            'https://source.unsplash.com/u3aYUsaHT20',
            'https://source.unsplash.com/6yBAQeeNROU',
        ];
        $cities = collect($this->cities())->flatten(1);
        foreach ($cities as $key => $districts) {
            $provience =   DB::table('provinces')->where('eng_name', $districts['province'])->value('id');
            $district = DB::table('districts')->where('en_name', $districts['district'])->value('id');

            foreach ($districts['cities'] as $key => $value) {
                City::Create([
                    'name' => $value,
                    'slug' => Str::slug($value),
                    'image' => $images[rand(0, 6)],
                    'district' => $district,
                    'province_id' => $provience
                ]);
            }
        }
    }
}
