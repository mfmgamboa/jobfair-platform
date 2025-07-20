<x-app-layout>
    <div class="px-6 py-8 bg-[#f4f6fa] min-h-screen">
        <h1 class="text-3xl font-bold text-[#004080] mb-6">Admin Dashboard</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#0074cc]">
                <h2 class="text-sm text-gray-500 uppercase">Total Employers</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">124</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#ff8c00]">
                <h2 class="text-sm text-gray-500 uppercase">Total Jobseekers</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">842</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#0074cc]">
                <h2 class="text-sm text-gray-500 uppercase">Job Fairs</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">8 Active</p>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-bold text-[#004080] mb-4">Recent Activity</h2>
            <ul class="space-y-3 text-sm text-gray-700">
                <li>✅ 5 Employers registered today</li>
                <li>📄 New job fair proposal submitted</li>
                <li>💬 Jobseeker feedback received</li>
                <li>🔍 23 job applications submitted</li>
            </ul>
        </div>

        <!-- Floating Chat Icon -->
        <x-floating-chat />
    </div>
</x-app-layout>
