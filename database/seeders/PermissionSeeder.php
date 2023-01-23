<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder {
    private function getPermissions(): array {
        return [
            [ 'name' => 'user-list', 'guard_name' => 'web' ],
            [ 'name' => 'user-create', 'guard_name' => 'web' ],
            [ 'name' => 'user-edit', 'guard_name' => 'web' ],
            [ 'name' => 'user-delete', 'guard_name' => 'web' ],

            [ 'name' => 'permission-list', 'guard_name' => 'web' ],
            [ 'name' => 'permission-create', 'guard_name' => 'web' ],
            [ 'name' => 'permission-edit', 'guard_name' => 'web' ],
            [ 'name' => 'permission-delete', 'guard_name' => 'web' ],

            [ 'name' => 'role-list', 'guard_name' => 'web' ],
            [ 'name' => 'role-create', 'guard_name' => 'web' ],
            [ 'name' => 'role-edit', 'guard_name' => 'web' ],
            [ 'name' => 'role-delete', 'guard_name' => 'web' ],

            [ 'name' => 'amenity-list', 'guard_name' => 'web' ],
            [ 'name' => 'amenity-create', 'guard_name' => 'web' ],
            [ 'name' => 'amenity-edit', 'guard_name' => 'web' ],
            [ 'name' => 'amenity-delete', 'guard_name' => 'web' ],

            [ 'name' => 'area-list', 'guard_name' => 'web' ],
            [ 'name' => 'area-create', 'guard_name' => 'web' ],
            [ 'name' => 'area-edit', 'guard_name' => 'web' ],
            [ 'name' => 'area-delete', 'guard_name' => 'web' ],

            [ 'name' => 'blog-category-list', 'guard_name' => 'web' ],
            [ 'name' => 'blog-category-create', 'guard_name' => 'web' ],
            [ 'name' => 'blog-category-edit', 'guard_name' => 'web' ],
            [ 'name' => 'blog-category-delete', 'guard_name' => 'web' ],

            [ 'name' => 'blog-list', 'guard_name' => 'web' ],
            [ 'name' => 'blog-create', 'guard_name' => 'web' ],
            [ 'name' => 'blog-edit', 'guard_name' => 'web' ],
            [ 'name' => 'blog-delete', 'guard_name' => 'web' ],

            [ 'name' => 'news-list', 'guard_name' => 'web' ],
            [ 'name' => 'news-create', 'guard_name' => 'web' ],
            [ 'name' => 'news-edit', 'guard_name' => 'web' ],
            [ 'name' => 'news-delete', 'guard_name' => 'web' ],

            [ 'name' => 'category-list', 'guard_name' => 'web' ],
            [ 'name' => 'category-create', 'guard_name' => 'web' ],
            [ 'name' => 'category-edit', 'guard_name' => 'web' ],
            [ 'name' => 'category-delete', 'guard_name' => 'web' ],

            [ 'name' => 'city-list', 'guard_name' => 'web' ],
            [ 'name' => 'city-create', 'guard_name' => 'web' ],
            [ 'name' => 'city-edit', 'guard_name' => 'web' ],
            [ 'name' => 'city-delete', 'guard_name' => 'web' ],

            [ 'name' => 'faq-list', 'guard_name' => 'web' ],
            [ 'name' => 'faq-create', 'guard_name' => 'web' ],
            [ 'name' => 'faq-edit', 'guard_name' => 'web' ],
            [ 'name' => 'faq-delete', 'guard_name' => 'web' ],

            [ 'name' => 'page-list', 'guard_name' => 'web' ],
            [ 'name' => 'page-create', 'guard_name' => 'web' ],
            [ 'name' => 'page-edit', 'guard_name' => 'web' ],
            [ 'name' => 'page-delete', 'guard_name' => 'web' ],

            [ 'name' => 'property-list', 'guard_name' => 'web' ],
            [ 'name' => 'property-create', 'guard_name' => 'web' ],
            [ 'name' => 'property-edit', 'guard_name' => 'web' ],
            [ 'name' => 'property-delete', 'guard_name' => 'web' ],

            [ 'name' => 'province-list', 'guard_name' => 'web' ],
            [ 'name' => 'province-create', 'guard_name' => 'web' ],
            [ 'name' => 'province-edit', 'guard_name' => 'web' ],
            [ 'name' => 'province-delete', 'guard_name' => 'web' ],

            [ 'name' => 'purpose-list', 'guard_name' => 'web' ],
            [ 'name' => 'purpose-create', 'guard_name' => 'web' ],
            [ 'name' => 'purpose-edit', 'guard_name' => 'web' ],
            [ 'name' => 'purpose-delete', 'guard_name' => 'web' ],

            [ 'name' => 'road-type-list', 'guard_name' => 'web' ],
            [ 'name' => 'road-type-create', 'guard_name' => 'web' ],
            [ 'name' => 'road-type-edit', 'guard_name' => 'web' ],
            [ 'name' => 'road-type-delete', 'guard_name' => 'web' ],

            [ 'name' => 'service-category-list', 'guard_name' => 'web' ],
            [ 'name' => 'service-category-create', 'guard_name' => 'web' ],
            [ 'name' => 'service-category-edit', 'guard_name' => 'web' ],
            [ 'name' => 'service-category-delete', 'guard_name' => 'web' ],

            [ 'name' => 'service-list', 'guard_name' => 'web' ],
            [ 'name' => 'service-create', 'guard_name' => 'web' ],
            [ 'name' => 'service-edit', 'guard_name' => 'web' ],
            [ 'name' => 'service-delete', 'guard_name' => 'web' ],

            [ 'name' => 'slider-list', 'guard_name' => 'web' ],
            [ 'name' => 'slider-create', 'guard_name' => 'web' ],
            [ 'name' => 'slider-edit', 'guard_name' => 'web' ],
            [ 'name' => 'slider-delete', 'guard_name' => 'web' ],

            [ 'name' => 'testimonial-list', 'guard_name' => 'web' ],
            [ 'name' => 'testimonial-create', 'guard_name' => 'web' ],
            [ 'name' => 'testimonial-edit', 'guard_name' => 'web' ],
            [ 'name' => 'testimonial-delete', 'guard_name' => 'web' ],

            [ 'name' => 'type-list', 'guard_name' => 'web' ],
            [ 'name' => 'type-create', 'guard_name' => 'web' ],
            [ 'name' => 'type-edit', 'guard_name' => 'web' ],
            [ 'name' => 'type-delete', 'guard_name' => 'web' ],

            [ 'name' => 'unit-list', 'guard_name' => 'web' ],
            [ 'name' => 'unit-create', 'guard_name' => 'web' ],
            [ 'name' => 'unit-edit', 'guard_name' => 'web' ],
            [ 'name' => 'unit-delete', 'guard_name' => 'web' ],

            [ 'name' => 'vendor-list', 'guard_name' => 'web' ],
            [ 'name' => 'vendor-create', 'guard_name' => 'web' ],
            [ 'name' => 'vendor-edit', 'guard_name' => 'web' ],
            [ 'name' => 'vendor-delete', 'guard_name' => 'web' ],

            [ 'name' => 'website-list', 'guard_name' => 'web' ],
            [ 'name' => 'website-create', 'guard_name' => 'web' ],
            [ 'name' => 'website-edit', 'guard_name' => 'web' ],
            [ 'name' => 'website-delete', 'guard_name' => 'web' ],

            //feature
            [ 'name' => 'feature-list', 'guard_name' => 'web' ],
            [ 'name' => 'feature-create', 'guard_name' => 'web' ],
            [ 'name' => 'feature-edit', 'guard_name' => 'web' ],
            [ 'name' => 'feature-delete', 'guard_name' => 'web' ],

            //agency
            [ 'name' => 'agency-list', 'guard_name' => 'web' ],
            [ 'name' => 'agency-create', 'guard_name' => 'web' ],
            [ 'name' => 'agency-edit', 'guard_name' => 'web' ],
            [ 'name' => 'agency-delete', 'guard_name' => 'web' ],

            //tradelink-category
            [ 'name' => 'tradelink-category-list', 'guard_name' => 'web' ],
            [ 'name' => 'tradelink-category-create', 'guard_name' => 'web' ],
            [ 'name' => 'tradelink-category-edit', 'guard_name' => 'web' ],
            [ 'name' => 'tradelink-category-delete', 'guard_name' => 'web' ],

            //tradelink
            [ 'name' => 'tradelink-list', 'guard_name' => 'web' ],
            [ 'name' => 'tradelink-create', 'guard_name' => 'web' ],
            [ 'name' => 'tradelink-edit', 'guard_name' => 'web' ],
            [ 'name' => 'tradelink-delete', 'guard_name' => 'web' ],

            //advertisement
            [ 'name' => 'advertisement-list', 'guard_name' => 'web' ],
            [ 'name' => 'advertisement-create', 'guard_name' => 'web' ],
            [ 'name' => 'advertisement-edit', 'guard_name' => 'web' ],
            [ 'name' => 'advertisement-delete', 'guard_name' => 'web' ],

            //team
            [ 'name' => 'team-list', 'guard_name' => 'web' ],
            [ 'name' => 'team-create', 'guard_name' => 'web' ],
            [ 'name' => 'team-edit', 'guard_name' => 'web' ],
            [ 'name' => 'team-delete', 'guard_name' => 'web' ],

            //menu
            [ 'name' => 'menu-list', 'guard_name' => 'web' ],
            [ 'name' => 'menu-create', 'guard_name' => 'web' ],
            [ 'name' => 'menu-edit', 'guard_name' => 'web' ],
            [ 'name' => 'menu-delete', 'guard_name' => 'web' ],

        ];
    }
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'permissions' )->insert( $this->getPermissions() );
    }
}
