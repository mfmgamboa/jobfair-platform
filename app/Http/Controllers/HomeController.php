<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $role = Auth::user()->getRoleNames()->first();

        return match($role) {
            'admin' => view('admin.dashboard'),
            'employer' => view('employer.dashboard'),
            'job_seeker' => view('jobseeker.dashboard'),
            'government' => view('government.dashboard'),
            default => view('welcome'),
        };
    }
}
