@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-[#0056A0] mb-6">Submit Required Documents</h1>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Upload Form --}}
    <div class="bg-white shadow rounded-lg p-6 mb-8">
        <form action="{{ route('employer.documents.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="document_type" class="block text-sm font-medium text-gray-700 mb-1">Document Type</label>
                <select name="document_type" id="document_type" required
                        class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#0056A0]">
                    <option value="">Select document type</option>
                    <option value="DTI/SEC">DTI/SEC</option>
                    <option value="CNPC">CNPC</option>
                    <option value="BIR">BIR</option>
                    {{-- Add more if needed --}}
                </select>
            </div>

            <div>
                <label for="document_file" class="block text-sm font-medium text-gray-700 mb-1">Upload File (PDF, DOC, JPG, PNG)</label>
                <input type="file" name="document_file" id="document_file" accept=".pdf,.doc,.docx,.jpg,.png" required
                       class="w-full border border-gray-300 rounded px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-[#0056A0] file:text-white hover:file:bg-blue-800">
            </div>

            <div>
                <button type="submit"
                        class="bg-[#0056A0] text-white px-6 py-2 rounded shadow hover:bg-blue-800 transition">
                    Upload Document
                </button>
            </div>
        </form>
    </div>

    {{-- Uploaded Documents Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Submitted Documents</h2>

        @if ($documents->count())
            <table class="w-full text-sm text-left text-gray-700 border">
                <thead class="bg-[#0056A0] text-white">
                    <tr>
                        <th class="px-4 py-2">Document Type</th>
                        <th class="px-4 py-2">File</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Uploaded</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr class="bg-gray-50 border-b">
                            <td class="px-4 py-2">{{ $document->document_type }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="text-[#0056A0] underline">View</a>
                            </td>
                            <td class="px-4 py-2 capitalize">{{ str_replace('_', ' ', $document->status) }}</td>
                            <td class="px-4 py-2">{{ $document->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">No documents uploaded yet.</p>
        @endif
    </div>
</div>
@endsection
