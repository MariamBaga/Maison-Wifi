<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@maisonwifi.com'],
            [
                'name' => 'Admin Maison WIFI',
                'password' => Hash::make('password123'),
            ]
        );
        $admin->assignRole('admin');

        $customer = User::firstOrCreate(
            ['email' => 'client@maisonwifi.com'],
            [
                'name' => 'Client Maison WIFI',
                'password' => Hash::make('password123'),
            ]
        );
        $customer->assignRole('customer');
    }
}
