@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h1 class="text-2xl font-bold text-green-800 mb-4">Government Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-4 bg-green-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-green-700">Event Attendance</h2>
                <p class="text-gray-700 mt-2">Monitor total attendees across all virtual job fairs.</p>
            </div>

            <div class="p-4 bg-blue-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-blue-700">Successful Hires</h2>
                <p class="text-gray-700 mt-2">Track number of successful job placements.</p>
            </div>

            <div class="p-4 bg-yellow-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-yellow-700">Company Participation</h2>
                <p class="text-gray-700 mt-2">View which companies are actively posting jobs and booths.</p>
            </div>

            <div class="p-4 bg-purple-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-purple-700">Download Reports</h2>
                <p class="text-gray-700 mt-2">Generate and download detailed analytics and statistics.</p>
            </div>

            <div class="p-4 bg-red-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-red-700">Feedback and Surveys</h2>
                <p class="text-gray-700 mt-2">Review user feedback and submitted surveys from jobseekers and employers.</p>
            </div>

            <div class="p-4 bg-gray-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-gray-700">System Overview</h2>
                <p class="text-gray-700 mt-2">Check platform health, uptime, and government-specific tools.</p>
            </div>
        </div>
    </div>
</div>
@endsection
