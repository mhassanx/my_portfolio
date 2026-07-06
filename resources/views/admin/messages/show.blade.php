@extends('admin.layouts.app')

@section('title', 'Message')
@section('heading', 'Message from ' . $message->name)

@section('content')
<div class="admin-card max-w-2xl">
    <div class="mb-6 border-b border-white/5 pb-4">
        <p class="text-sm text-gray-500">From</p>
        <p class="text-lg font-medium text-white">{{ $message->name }}</p>
        <a href="mailto:{{ $message->email }}" class="text-accent hover:underline">{{ $message->email }}</a>
        <p class="mt-2 text-xs text-gray-600">{{ $message->created_at->format('F j, Y \a\t g:i A') }}</p>
    </div>
    <div class="prose prose-invert max-w-none">
        <p class="whitespace-pre-wrap text-gray-300">{{ $message->message }}</p>
    </div>
    <div class="mt-8 flex gap-4">
        <a href="{{ route('admin.messages.index') }}" class="text-gray-400 hover:text-white">← Back</a>
        <form method="POST" action="{{ route('admin.messages.destroy', $message) }}" onsubmit="return confirm('Delete this message?')">
            @csrf @method('DELETE')
            <button type="submit" class="text-red-400 hover:underline">Delete</button>
        </form>
    </div>
</div>
@endsection
