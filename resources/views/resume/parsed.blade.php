@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Resume Summary</h2>
    <pre style="white-space: pre-wrap;">{{ $summary }}</pre>

    <h4 class="mt-4">Full Extracted Text</h4>
    <textarea class="form-control" rows="15">{{ $text }}</textarea>
</div>
@endsection
