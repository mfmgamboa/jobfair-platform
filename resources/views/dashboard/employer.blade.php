<x-app-layout>
    <div class="px-6 py-8 bg-[#f4f6fa] min-h-screen">
        <h1 class="text-3xl font-bold text-[#004080] mb-6">Employer Dashboard</h1>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4 mb-8">
            <a href="{{ route('jobs.create') }}"
               class="inline-block bg-[#ff8c00] hover:bg-[#e67600] text-white px-6 py-3 rounded-lg shadow transition">
                ➕ Post a New Job
            </a>
            <a href="#" class="inline-block bg-[#0074cc] hover:bg-[#005fa3] text-white px-6 py-3 rounded-lg shadow transition">
                📂 View Applications
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#0074cc]">
                <h2 class="text-sm text-gray-500 uppercase">Open Positions</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">5</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#ff8c00]">
                <h2 class="text-sm text-gray-500 uppercase">Total Applicants</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">72</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#0074cc]">
                <h2 class="text-sm text-gray-500 uppercase">Interviews Scheduled</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">8</p>
            </div>
        </div>

        <!-- Job Listings -->
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-bold text-[#004080] mb-4">Your Recent Job Posts</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-3">
                    <strong>Software Developer</strong> — 12 applicants — <span class="text-sm text-gray-500">Posted 2 days ago</span>
                </li>
                <li class="py-3">
                    <strong>Marketing Coordinator</strong> — 8 applicants — <span class="text-sm text-gray-500">Posted 1 week ago</span>
                </li>
                <li class="py-3">
                    <strong>UX Designer</strong> — 5 applicants — <span class="text-sm text-gray-500">Posted 3 weeks ago</span>
                </li>
            </ul>
        </div>

        <!-- Floating Chat -->
        <x-floating-chat />
    </div>
</x-app-layout>
