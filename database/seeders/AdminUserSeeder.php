<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'admin'], // cari user dengan username admin
            [
                'name' => 'Admin Rumah BUMN',
                'email' => 'admin@rumahbumn.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );
    }
}
