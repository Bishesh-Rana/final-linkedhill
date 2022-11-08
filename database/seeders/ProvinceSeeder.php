<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\City;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'eng_name' => 'Province No. 1',
                'np_name' => 'रदेश नं १',
            ],
            [
                'eng_name' => 'Province No. 2',
                'np_name' => ' प्रदेश नं २',
            ],
            [
                'eng_name' => 'Bagmati',
                'np_name' => 'बाग्मती प्रदेश',
            ],
            [
                'eng_name' => 'Gandaki',
                'np_name' => 'गण्डकी प्रदेश',
            ],
            [
                'eng_name' => 'Province No. 5',
                'np_name' => ' प्रदेश नं ५',
            ],
            [
                'eng_name' => 'Karnali',
                'np_name' => 'कर्णाली प्रदेश',
            ],
            [
                'eng_name' => 'SudurPaschim',
                'np_name' => ' सुदूरपश्चिम प्रदेश',
            ]
        ];
        \DB::table('provinces')->insert($data);
        City::create([
            'name' => 'Sundhara',
            'slug' => 'sundhara',
            'feature_in_homepage' => true,
            'district' => 28,
            'province_id' => 3,
        ]);
        Area::create([
            'name' => 'dharahara',
            'slug' => 'dharahara',
            'city_id' => 1
        ]);
    }
}
