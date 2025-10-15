<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'Christian',
            'middle_name' => 'Kiyumbi',
            'last_name' => 'Kiyumbi',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('papabebe')
        ]);

        $adminRole = Role::firstOrCreate(['name' => 'Superadmin']);
        $adminRole->syncPermissions(Permission::all());
        $user->assignRole($adminRole);
    }
}
