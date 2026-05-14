<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Caelus Admin',
            'username' => 'caelus', // LOGIN PAKAI INI
            'password' => Hash::make('admin123'), // PASSWORDNYA INI
            'role' => 'admin',
        ]);
    }
}