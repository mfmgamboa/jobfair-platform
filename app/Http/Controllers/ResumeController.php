<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class ResumeController extends Controller
{
    public function upload()
    {
        return view('resume.upload');
    }

    public function parse(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('resume');

        $parser = new Parser();
        $pdf = $parser->parseFile($file->getRealPath());
        $text = $pdf->getText();

        $lines = explode("\n", $text);
        $extracted = [
            'name' => $lines[0] ?? '',
            'email' => '',
            'phone' => '',
            'skills' => [],
            'experience' => [],
            'education' => [],
        ];

        return view('resume.result', ['data' => $extracted, 'raw' => $text]);
    }
}
