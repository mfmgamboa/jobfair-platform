<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobseekerDashboardController extends Controller
{
    public function index()
    {
        return view('jobseeker.dashboard');
    }
}
