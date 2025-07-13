@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Resume Maker</h2>
    <form method="POST" action="#">
        @csrf
        <div class="mb-4">
            <label class="block">Education</label>
            <textarea name="education" class="w-full border p-2 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label class="block">Certifications</label>
            <textarea name="certifications" class="w-full border p-2 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label class="block">Training</label>
            <textarea name="training" class="w-full border p-2 rounded"></textarea>
        </div>
        <div class="mb-4">
            <label class="block">Work Experience</label>
            <textarea name="experience" class="w-full border p-2 rounded"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Generate Resume</button>
    </form>
</div>
@endsection