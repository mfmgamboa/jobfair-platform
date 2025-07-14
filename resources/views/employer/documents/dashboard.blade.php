@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold text-blue-800 mb-4">Upload Required Documents</h2>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('employer.documents.upload') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">DTI / SEC Registration</label>
            <input type="file" name="dti_document" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-medium">CNPC Document</label>
            <input type="file" name="cnpc_document" class="border p-2 w-full">
        </div>

        <div>
            <label class="block font-medium">BIR Registration</label>
            <input type="file" name="bir_document" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Upload Documents
        </button>
    </form>
</div>
@endsection
