<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobseekerProfile;
use App\Models\Employer;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jobSeekers = JobseekerProfile::all();
        $employers = Employer::all();
        return view('admin.dashboard', compact('jobSeekers', 'employers'));
    }
}
