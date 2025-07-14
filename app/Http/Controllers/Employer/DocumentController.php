<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $employer = Auth::user();
        return view('employer.documents.upload', compact('employer'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'dti_document' => 'file|mimes:pdf,doc,docx|max:2048',
            'cnpc_document' => 'file|mimes:pdf,doc,docx|max:2048',
            'bir_document' => 'file|mimes:pdf,doc,docx|max:2048',
        ]);

        $employer = Auth::user();

        if ($request->hasFile('dti_document')) {
            $employer->dti_document = $request->file('dti_document')->store('documents');
        }
        if ($request->hasFile('cnpc_document')) {
            $employer->cnpc_document = $request->file('cnpc_document')->store('documents');
        }
        if ($request->hasFile('bir_document')) {
            $employer->bir_document = $request->file('bir_document')->store('documents');
        }

        $employer->save();

        return back()->with('success', 'Documents uploaded successfully!');
    }
}
