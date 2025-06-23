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
        User::create([
            'nama' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin2025root'),
            'role' => 'admin'
        ]);

        User::create([
            'nama' => 'owner',
            'username' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => bcrypt('Owner2025root'),
            'role' => 'owner'
        ]);
    }
}
