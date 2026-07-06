@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
    <div class="admin-card">
        <p class="text-sm text-gray-500">Projects</p>
        <p class="mt-2 text-3xl font-bold text-white">{{ $projectCount }}</p>
    </div>
    <div class="admin-card">
        <p class="text-sm text-gray-500">Categories</p>
        <p class="mt-2 text-3xl font-bold text-white">{{ $categoryCount }}</p>
    </div>
    <div class="admin-card">
        <p class="text-sm text-gray-500">Skills</p>
        <p class="mt-2 text-3xl font-bold text-white">{{ $skillCount }}</p>
    </div>
    <div class="admin-card">
        <p class="text-sm text-gray-500">Unread Messages</p>
        <p class="mt-2 text-3xl font-bold text-accent">{{ $messageCount }}</p>
    </div>
</div>

<div class="mt-8 admin-card">
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-white">Recent Messages</h2>
        <a href="{{ route('admin.messages.index') }}" class="text-sm text-accent hover:underline">View all</a>
    </div>
    @forelse ($recentMessages as $msg)
        <a href="{{ route('admin.messages.show', $msg) }}" class="flex items-center justify-between border-b border-white/5 py-3 last:border-0 hover:bg-white/5 px-2 -mx-2 rounded">
            <div>
                <p class="font-medium text-white">{{ $msg->name }}</p>
                <p class="text-sm text-gray-500">{{ Str::limit($msg->message, 60) }}</p>
            </div>
            <span class="text-xs text-gray-600">{{ $msg->created_at->diffForHumans() }}</span>
        </a>
    @empty
        <p class="text-gray-500">No messages yet.</p>
    @endforelse
</div>
@endsection
