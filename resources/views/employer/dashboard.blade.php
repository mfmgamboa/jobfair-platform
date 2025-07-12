@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Employer Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-4 bg-blue-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-blue-700">Your Booth</h2>
                <p class="text-gray-700 mt-2">View and update your company booth details and branding.</p>
            </div>

            <div class="p-4 bg-green-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-green-700">Posted Jobs</h2>
                <p class="text-gray-700 mt-2">Manage your active job listings and applications.</p>
            </div>

            <div class="p-4 bg-yellow-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-yellow-700">Interviews</h2>
                <p class="text-gray-700 mt-2">Schedule and track interview appointments with candidates.</p>
            </div>

            <div class="p-4 bg-purple-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-purple-700">Company Profile</h2>
                <p class="text-gray-700 mt-2">Edit your company information, logo, and contact details.</p>
            </div>
        </div>
    </div>
</div>
@endsection
