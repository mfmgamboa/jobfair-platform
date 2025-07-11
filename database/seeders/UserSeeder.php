<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = ['admin', 'employer', 'job_seeker', 'government'];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@jobfair.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');
    }
}
