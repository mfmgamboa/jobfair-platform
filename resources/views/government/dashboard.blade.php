@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold text-[#0056A0] mb-6">Government Dashboard</h1>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Pending Employer Documents Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Pending Employer Documents</h2>

        @if ($documents->count())
            <table class="w-full text-sm text-left text-gray-700 border">
                <thead class="bg-[#0056A0] text-white">
                    <tr>
                        <th class="px-4 py-2">Employer</th>
                        <th class="px-4 py-2">Document Type</th>
                        <th class="px-4 py-2">File</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                        <tr class="bg-gray-50 border-b">
                            <td class="px-4 py-2">{{ $document->employer->company_name }}</td>
                            <td class="px-4 py-2">{{ $document->document_type }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank" class="text-[#0056A0] underline">View</a>
                            </td>
                            <td class="px-4 py-2 capitalize">{{ str_replace('_', ' ', $document->status) }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('government.document.approve') }}" method="POST" onsubmit="return confirm('Approve this document?')">
                                    @csrf
                                    <input type="hidden" name="document_id" value="{{ $document->id }}">
                                    <button type="submit" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 text-sm">
                                        Approve
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600">No pending documents for approval.</p>
        @endif
    </div>
</div>
@endsection
