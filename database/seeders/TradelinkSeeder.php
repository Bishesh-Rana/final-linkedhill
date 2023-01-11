<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TradelinkCategory;
use App\Models\Tradelink;

class TradelinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TradelinkCategory::factory()->count(5)->create();
        Tradelink::factory()->count(30)->create();

    }
}
