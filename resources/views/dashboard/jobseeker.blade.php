<x-app-layout>
    <div class="px-6 py-8 bg-[#f4f6fa] min-h-screen">
        <h1 class="text-3xl font-bold text-[#004080] mb-6">Jobseeker Dashboard</h1>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4 mb-8">
            <a href="#" class="inline-block bg-[#0074cc] hover:bg-[#005fa3] text-white px-6 py-3 rounded-lg shadow transition">
                🔍 Search Jobs
            </a>
            <a href="#" class="inline-block bg-[#ff8c00] hover:bg-[#e67600] text-white px-6 py-3 rounded-lg shadow transition">
                📄 Upload Resume
            </a>
            <a href="#" class="inline-block bg-white text-[#004080] border border-[#004080] px-6 py-3 rounded-lg shadow transition hover:bg-[#f0f4fa]">
                🎯 My Applications
            </a>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#0074cc]">
                <h2 class="text-sm text-gray-500 uppercase">Applications Sent</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">14</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#ff8c00]">
                <h2 class="text-sm text-gray-500 uppercase">Interviews Scheduled</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">3</p>
            </div>
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-[#0074cc]">
                <h2 class="text-sm text-gray-500 uppercase">Saved Jobs</h2>
                <p class="text-2xl font-semibold text-[#004080] mt-1">5</p>
            </div>
        </div>

        <!-- Recent Applications -->
        <div class="bg-white rounded-xl shadow p-6">
            <h2 class="text-xl font-bold text-[#004080] mb-4">Recent Applications</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-3">
                    <strong>Frontend Developer</strong> at TechCorp — <span class="text-sm text-gray-500">Applied 2 days ago</span>
                </li>
                <li class="py-3">
                    <strong>Digital Marketing Analyst</strong> at MarketPro — <span class="text-sm text-gray-500">Applied 5 days ago</span>
                </li>
                <li class="py-3">
                    <strong>IT Support Specialist</strong> at HelpHub — <span class="text-sm text-gray-500">Applied 1 week ago</span>
                </li>
            </ul>
        </div>

        <!-- Floating Chat -->
        <x-floating-chat />
    </div>
</x-app-layout>
