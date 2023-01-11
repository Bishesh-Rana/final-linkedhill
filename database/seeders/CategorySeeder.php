<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(10)->create()->each(function ($category) {
            $category->blogs()->saveMany(Blog::factory()->count(5)->create());

        });; //
    }
}
