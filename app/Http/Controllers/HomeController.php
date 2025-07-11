<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;
>>>>>>> 3440896b19834a125e379e78170c4d2876d4c05c

class HomeController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $role = Auth::user()->getRoleNames()->first();

        return match($role) {
            'admin' => view('admin.dashboard'),
            'employer' => view('employer.dashboard'),
            'job_seeker' => view('jobseeker.dashboard'),
            'government' => view('government.dashboard'),
            default => view('welcome'),
        };
=======
        return view('home'); // This should match resources/views/home.blade.php
>>>>>>> 3440896b19834a125e379e78170c4d2876d4c05c
    }
}
