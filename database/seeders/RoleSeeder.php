<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    private function getRoles(): array
    {
        return [
            ['name' => 'Super Admin', 'guard_name' => 'web'],
            ['name' => 'Admin', 'guard_name' => 'web'],
            ['name' => 'Agent', 'guard_name' => 'web'],
            ['name' => 'Builder', 'guard_name' => 'web'],
            ['name' => 'Customer', 'guard_name' => 'web'],
        ];
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('roles')->truncate();
        DB::table('roles')->insert($this->getRoles());
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
