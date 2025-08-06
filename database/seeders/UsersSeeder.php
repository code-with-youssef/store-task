<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'youssef',
            'password' => Hash::make('123456789'),
            'email' => 'youssef@gmail.com',
        ]);


        User::create([
            'name' => 'Admin',
            'password' => Hash::make('123456789'),
            'email' => 'Admin@gmail.com',
            'role' => 'admin',
        ]);
    }
}
