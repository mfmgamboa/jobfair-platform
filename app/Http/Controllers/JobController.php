<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // Validate and save job posting logic here

        return redirect()->route('dashboard')->with('success', 'Job posted successfully.');
    }
}
