<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TestUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate([
            'email' => 'admin@jobquest.ph',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'role' => 'admin', // optional if using role-based logic
        ]);

        // Employer user
        User::updateOrCreate([
            'email' => 'employer@jobquest.ph',
        ], [
            'name' => 'Employer Inc.',
            'password' => Hash::make('password'),
            'role' => 'employer',
        ]);

        // Jobseeker user
        User::updateOrCreate([
            'email' => 'jobseeker@jobquest.ph',
        ], [
            'name' => 'Juan Dela Cruz',
            'password' => Hash::make('password'),
            'role' => 'jobseeker',
        ]);
    }
}
