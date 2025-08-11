<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'first_name' => 'Christian',
            'middle_name' => 'Kiyumbi',
            'last_name' => 'Kiyumbi',
            'email' => 'admin@example.com',
            'function' => 'Prefet',
            'role' => 'admin',
            'password' => Hash::make('password')
        ]);

        User::factory()->create([
            'first_name' => 'Christian',
            'middle_name' => 'Kiyumbi',
            'last_name' => 'Kiyumbi',
            'email' => 'user@example.com',
            'function' => 'Secretaire',
            'role' => 'user',
            'password' => Hash::make('password')
        ]);
    }
}
