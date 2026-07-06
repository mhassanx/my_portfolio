@extends('admin.layouts.app')

@section('title', 'Messages')
@section('heading', 'Contact Messages')

@section('content')
<div class="admin-card overflow-hidden p-0">
    <table class="w-full text-left text-sm">
        <thead class="border-b border-white/5 bg-white/5">
            <tr>
                <th class="px-6 py-3 font-medium text-gray-400">From</th>
                <th class="px-6 py-3 font-medium text-gray-400">Message</th>
                <th class="px-6 py-3 font-medium text-gray-400">Date</th>
                <th class="px-6 py-3 font-medium text-gray-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $msg)
                <tr class="border-b border-white/5 hover:bg-white/5 {{ !$msg->is_read ? 'bg-accent/5' : '' }}">
                    <td class="px-6 py-4">
                        <p class="font-medium text-white">{{ $msg->name }}</p>
                        <p class="text-xs text-gray-500">{{ $msg->email }}</p>
                    </td>
                    <td class="px-6 py-4 text-gray-400">{{ Str::limit($msg->message, 80) }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $msg->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="text-accent hover:underline">View</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">No messages yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $messages->links() }}</div>
@endsection
