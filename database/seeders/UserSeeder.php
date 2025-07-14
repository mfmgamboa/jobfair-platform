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
        // Create roles
        $roles = ['admin', 'employer', 'job_seeker', 'government'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@jobfair.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('admin');

        // Employer
        $employer = User::create([
            'name' => 'Test Employer',
            'email' => 'employer@jobfair.com',
            'password' => Hash::make('password'),
        ]);
        $employer->assignRole('employer');

        // Job Seeker
        $jobSeeker = User::create([
            'name' => 'Test Job Seeker',
            'email' => 'jobseeker@jobfair.com',
            'password' => Hash::make('password'),
        ]);
        $jobSeeker->assignRole('job_seeker');

        // Optional: Government user (if stored in separate table, skip this)
        $gov = User::create([
            'name' => 'Government Officer',
            'email' => 'government@jobfair.com',
            'password' => Hash::make('password'),
        ]);
        $gov->assignRole('government');
    }
}
