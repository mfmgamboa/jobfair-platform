<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#0B3558] leading-tight">
            Post a New Job
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-100">
                <form method="POST" action="{{ route('jobs.store') }}">
                    @csrf

                    <!-- Job Title -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="title">Job Title</label>
                        <input type="text" name="title" id="title"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-[#0074cc] focus:border-[#0074cc]"
                               required>
                    </div>

                    <!-- Job Description -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                        <textarea name="description" id="description" rows="5"
                                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-[#0074cc] focus:border-[#0074cc]"
                                  required></textarea>
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="location">Location</label>
                        <input type="text" name="location" id="location"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-[#0074cc] focus:border-[#0074cc]">
                    </div>

                    <!-- Salary -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="salary">Salary</label>
                        <input type="text" name="salary" id="salary"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-4 py-2 focus:ring-[#0074cc] focus:border-[#0074cc]">
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-6">
                        <button type="submit"
                                class="bg-[#FFA500] hover:bg-[#FF8C00] text-white font-semibold py-2 px-6 rounded shadow transition duration-200">
                            Post Job
                        </button>
                        <a href="{{ route('dashboard') }}"
                           class="ml-4 inline-block text-sm text-[#0074cc] hover:underline">Back to Dashboard</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-floating-chat />
</x-app-layout>
