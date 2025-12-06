<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@site.com',
            'password' => 'admin@site.com',
        ]);

        $admin->assignRole('admin');

        $customer = User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@site.com',
            'password' => 'customer@site.com',
        ]);

        $customer->assignRole('user');
    }
}
