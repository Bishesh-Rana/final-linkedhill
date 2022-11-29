<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(5)->create();
        Blog::factory()->count(45)->create()->each(function ($property) {
            $property->categories()->sync();
        });;
    }
}
