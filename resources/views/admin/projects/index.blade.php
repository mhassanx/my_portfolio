@extends('admin.layouts.app')

@section('title', 'Projects')
@section('heading', 'Projects')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <p class="text-gray-500">Manage your portfolio projects.</p>
    <a href="{{ route('admin.projects.create') }}" class="btn-accent">Add Project</a>
</div>

<div class="admin-card overflow-hidden p-0">
    <table class="w-full text-left text-sm">
        <thead class="border-b border-white/5 bg-white/5">
            <tr>
                <th class="px-6 py-3 font-medium text-gray-400">Title</th>
                <th class="px-6 py-3 font-medium text-gray-400">Category</th>
                <th class="px-6 py-3 font-medium text-gray-400">Links</th>
                <th class="px-6 py-3 font-medium text-gray-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr class="border-b border-white/5 hover:bg-white/5">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if ($project->image_path)
                                <img src="{{ $project->image_url }}" alt="" class="h-10 w-16 rounded object-cover">
                            @endif
                            <span class="font-medium text-white">{{ $project->title }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="rounded-full bg-accent/10 px-2 py-0.5 text-xs text-accent">{{ $project->category->name }}</span>
                    </td>
                    <td class="px-6 py-4 text-gray-500">
                        @if ($project->deployed_link) Live @endif
                        @if ($project->github_link) GitHub @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-accent hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" class="inline ml-3" onsubmit="return confirm('Delete this project?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">No projects yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">{{ $projects->links() }}</div>
@endsection
