<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'username' => 'admin',
            'first_name' => 'Admin',
            'last_name' => 'User',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'username' => 'regularuser',
            'first_name' => 'Regular',
            'last_name' => 'User',
            'password' => bcrypt('password'),
            'role' => 'user',
        ]);
    }
}
