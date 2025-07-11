<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployerDashboardController extends Controller
{
    public function index()
    {
        return view('employer.dashboard');
    }
}
