@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Resume Data Extracted</h2>

    <div class="mb-3">
        <strong>Name:</strong> {{ $data['name'] }}
    </div>

    <div class="mb-3">
        <strong>Raw Text:</strong>
        <pre style="background: #f8f9fa; padding: 1rem;">{{ $raw }}</pre>
    </div>
</div>
@endsection
