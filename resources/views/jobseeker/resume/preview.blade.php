@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Extracted Resume Data</h2>
    <textarea class="w-full h-96 border p-2 rounded" readonly>{{ $text }}</textarea>
</div>
@endsection