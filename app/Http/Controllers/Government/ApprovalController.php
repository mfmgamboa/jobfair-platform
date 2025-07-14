<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employer;
use Illuminate\Support\Facades\Auth;

class ApprovalController extends Controller
{
    public function index()
    {
        $employers = Employer::with('documents')->get();
        return view('government.approvals.index', compact('employers'));
    }

    public function approve(Request $request, $employerId)
    {
        $employer = Employer::findOrFail($employerId);
        $role = Auth::guard('government')->user()->role;

        if ($role === 'PESO') {
            $employer->peso_approved = true;
        } elseif ($role === 'DOLE' && $employer->peso_approved) {
            $employer->dole_approved = true;
        }

        $employer->save();

        return redirect()->back()->with('success', 'Approval updated successfully.');
    }
}
