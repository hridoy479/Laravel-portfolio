<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            [ 'email' => 'hridoymolla479@gmail.com'],
            [
            'name' => 'Admin',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);

        User::firstOrCreate(
            [ 'email' => 'user@example.com'],
            [
            'name' => 'User',
            'role' => 'user',
            'password' => bcrypt('password'),
        ]);
    }
}
