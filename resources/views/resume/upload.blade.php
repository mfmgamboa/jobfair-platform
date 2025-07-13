@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-2xl border border-blue-100">
    <h2 class="text-2xl font-semibold text-blue-700 mb-6">Upload Your Resume</h2>

    @if (session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-200 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="mb-4 text-red-700 bg-red-100 border border-red-200 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('resume.parse') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="resume" class="block text-sm font-medium text-gray-700 mb-1">Select your resume (PDF or DOC)</label>
            <input type="file" name="resume" id="resume" required
                class="block w-full text-sm text-gray-700 bg-blue-50 border border-blue-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 file:bg-blue-100 file:border-none file:px-4 file:py-2 file:rounded file:text-blue-800">
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded-lg shadow transition-all">
                Upload & Parse
            </button>
        </div>
    </form>
</div>
@endsection
