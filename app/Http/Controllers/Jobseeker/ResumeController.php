<?php

namespace App\Http\Controllers\Jobseeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\IOFactory;
use App\Models\User;

class ResumeController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('resume');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('resumes', $filename, 'public');

        $content = '';
        if ($file->getClientOriginalExtension() === 'pdf') {
            $parser = new Parser();
            $pdf = $parser->parseFile($file->getPathname());
            $content = $pdf->getText();
        } elseif (in_array($file->getClientOriginalExtension(), ['doc', 'docx'])) {
            $phpWord = IOFactory::load($file->getPathname());
            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if (method_exists($element, 'getText')) {
                        $content .= $element->getText() . '\n';
                    }
                }
            }
        }

        return view('jobseeker.resume.preview', ['text' => $content]);
    }

    public function resumeMaker()
    {
        return view('jobseeker.resume.builder');
    }
}