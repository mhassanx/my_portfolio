@extends('admin.layouts.app')

@section('title', 'Social Links')
@section('heading', 'Social Links')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <p class="text-gray-500">Manage footer social links.</p>
    <a href="{{ route('admin.social-links.create') }}" class="btn-accent">Add Link</a>
</div>

<div class="admin-card overflow-hidden p-0">
    <table class="w-full text-left text-sm">
        <thead class="border-b border-white/5 bg-white/5">
            <tr>
                <th class="px-6 py-3 font-medium text-gray-400">Platform</th>
                <th class="px-6 py-3 font-medium text-gray-400">URL</th>
                <th class="px-6 py-3 font-medium text-gray-400">Icon</th>
                <th class="px-6 py-3 font-medium text-gray-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($socialLinks as $link)
                <tr class="border-b border-white/5 hover:bg-white/5">
                    <td class="px-6 py-4 font-medium text-white">{{ $link->platform_name }}</td>
                    <td class="px-6 py-4 text-gray-500 truncate max-w-xs">{{ $link->url }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $link->icon ?? '—' }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.social-links.edit', $link) }}" class="text-accent hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.social-links.destroy', $link) }}" class="inline ml-3" onsubmit="return confirm('Delete this link?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">No social links yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
