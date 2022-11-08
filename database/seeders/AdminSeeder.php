<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =   User::create(
            [
                'name' => 'nectardigit',
                'email' => 'nectardigit@gmail.com',
                'password' => Hash::make('admin123'),
                'phone' => '98022',
            ]
        );

        Admin::create([
            'name' => 'nectardigit',
            'email' => 'nectardigit@gmail.com',
            'password' => Hash::make('admin123'),
            'mobile' => '98022',
        ]);

        $user->assignRole(['1']); //Super Admin
        $admin =   User::create(
            [
                'name' => 'Linkedhill',
                'email' => 'linkedhillcom@gmail.com',
                'password' => Hash::make('Nepal@321$'),
            ]
        );
        $admin->assignRole(['2']); //Admin

        $agent =   User::create(
            [
                'name' => 'Linkedhill Agent',
                'email' => 'linkedhillagent@gmail.com',
                'password' => Hash::make('linkedhillagent'),
            ]
        );
        $agent->assignRole(['3']); //Agent

    }
}
