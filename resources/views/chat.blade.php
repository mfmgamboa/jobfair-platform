@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="bg-blue-600 px-6 py-4 text-white flex justify-between items-center">
            <img src="/images/jobquest-logo.png" alt="JobQuest Logo" class="h-10 object-contain">
            <div class="text-sm">
                Logged in as: <strong>{{ Auth::user()->name }}</strong>
                ({{ Auth::user()->getRoleNames()->first() }})
            </div>
        </div>
        <!-- ✅ This tag must match the Vue component -->
        <chat-app></chat-app>
    </div>
</div>
@endsection
