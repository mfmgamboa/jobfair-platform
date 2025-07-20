@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Dashboard Header -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h1 class="text-2xl font-bold text-[#0074cc]">Jobseeker Dashboard</h1>
        <p class="text-gray-600 mt-2">Welcome back, {{ Auth::user()->name }}!</p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Applications Submitted -->
        <div class="bg-white rounded-lg shadow-md p-5 border-t-4 border-[#0074cc]">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Applications</h2>
            <p class="text-3xl font-bold text-[#0074cc]">24</p>
        </div>

        <!-- Interviews Scheduled -->
        <div class="bg-white rounded-lg shadow-md p-5 border-t-4 border-[#f7941d]">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Interviews</h2>
            <p class="text-3xl font-bold text-[#f7941d]">3</p>
        </div>

        <!-- Saved Jobs -->
        <div class="bg-white rounded-lg shadow-md p-5 border-t-4 border-[#00bfff]">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Saved Jobs</h2>
            <p class="text-3xl font-bold text-[#00bfff]">10</p>
        </div>
    </div>

    <!-- Recent Activity (placeholder) -->
    <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h3>
        <ul class="list-disc list-inside text-sm text-gray-700">
            <li>Applied to “Backend Developer” at XYZ Corp</li>
            <li>Interview invitation from ABC Solutions</li>
            <li>Saved “UI/UX Designer” position</li>
        </ul>
    </div>
</div>

<!-- Floating Chat -->
<x-floating-chat :user-id="auth()->id()" :recipient-id="null" />
@endsection
