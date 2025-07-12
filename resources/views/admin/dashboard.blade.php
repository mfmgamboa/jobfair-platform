@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white rounded-2xl shadow-md p-6">
        <h1 class="text-2xl font-bold text-red-800 mb-4">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-4 bg-red-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-red-700">Manage Jobseekers</h2>
                <p class="text-gray-700 mt-2">View, edit, or delete jobseeker accounts and profiles.</p>
            </div>

            <div class="p-4 bg-blue-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-blue-700">Manage Employers</h2>
                <p class="text-gray-700 mt-2">Approve companies, review job posts, and manage booths.</p>
            </div>

            <div class="p-4 bg-green-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-green-700">Manage Government Users</h2>
                <p class="text-gray-700 mt-2">Add, assign, or review government accounts and reports.</p>
            </div>

            <div class="p-4 bg-yellow-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-yellow-700">Analytics & Reports</h2>
                <p class="text-gray-700 mt-2">Track platform usage, attendance, and hire rates.</p>
            </div>

            <div class="p-4 bg-purple-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-purple-700">Platform Settings</h2>
                <p class="text-gray-700 mt-2">Change system settings, manage modules, or enable features.</p>
            </div>

            <div class="p-4 bg-gray-100 rounded-xl shadow">
                <h2 class="text-lg font-semibold text-gray-700">Audit Logs</h2>
                <p class="text-gray-700 mt-2">View user actions and system activity for transparency.</p>
            </div>
        </div>
    </div>
</div>
@endsection
