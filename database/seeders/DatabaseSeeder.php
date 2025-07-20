<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create roles if they don't exist
        foreach (['admin', 'employer', 'jobseeker'] as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $admin->assignRole('admin');

        // Create Employer
        $employer = User::create([
            'name' => 'Employer User',
            'email' => 'employer@test.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $employer->assignRole('employer');

        // Create Jobseeker
        $jobseeker = User::create([
            'name' => 'Jobseeker User',
            'email' => 'jobseeker@test.com',
            'password' => Hash::make('password'),
            'email_verified_at' => Carbon::now(),
        ]);
        $jobseeker->assignRole('jobseeker');
    }
}
