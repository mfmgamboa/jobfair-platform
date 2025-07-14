<?php

namespace App\Http\Controllers\Government;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployerDocument;
use Illuminate\Support\Facades\Auth;

class GovernmentDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::guard('government')->user();

        // PESO sees pending docs, DOLE sees peso-approved
        if ($user->role === 'PESO') {
            $documents = EmployerDocument::with('employer')
                ->where('status', 'pending')
                ->get();
        } elseif ($user->role === 'DOLE') {
            $documents = EmployerDocument::with('employer')
                ->where('status', 'approved_peso')
                ->get();
        } else {
            $documents = collect(); // empty
        }

        return view('government.dashboard', compact('documents'));
    }

    public function approveDocument(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:employer_documents,id',
            'approval_level' => 'required|in:peso,dole',
        ]);

        $document = EmployerDocument::find($request->document_id);

        if ($request->approval_level === 'peso' && $document->status === 'pending') {
            $document->status = 'approved_peso';
        } elseif ($request->approval_level === 'dole' && $document->status === 'approved_peso') {
            $document->status = 'approved_dole';
        } else {
            return back()->with('error', 'Invalid document status for approval.');
        }

        $document->save();

        return back()->with('success', 'Document approved successfully.');
    }
}
