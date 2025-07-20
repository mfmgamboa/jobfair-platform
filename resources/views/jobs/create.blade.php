<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-[#004080]">
            Create Job Posting
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow border border-gray-200">
            <form method="POST" action="{{ route('jobs.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Job Title</label>
                    <input type="text" name="title" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#0074cc]" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Location</label>
                    <input type="text" name="location" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#0074cc]" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Description</label>
                    <textarea name="description" rows="5" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#0074cc]" required></textarea>
                </div>

                <button type="submit"
                        class="bg-[#0074cc] hover:bg-[#005fa3] text-white font-semibold px-6 py-2 rounded-lg">
                    Post Job
                </button>
            </form>
        </div>
    </div>

    @include('components.floating-chat')
</x-app-layout>
