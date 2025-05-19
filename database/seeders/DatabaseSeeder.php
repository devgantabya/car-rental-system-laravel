<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'digonto@live.com',
            'password' => bcrypt('123'),
            'role' => 'admin',
            'phone' => '1234567890',
            'address' => '123 Admin Street, Admin City',
            'email_verified_at' => now(),
        ]);

        // Create some customer users
        User::factory(15)->create();

        // Create cars
        Car::factory(25)->create();
    }
}