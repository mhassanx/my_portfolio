@extends('admin.layouts.app')

@section('title', 'Categories')
@section('heading', 'Categories')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <p class="text-gray-500">Manage project categories for filtering.</p>
    <a href="{{ route('admin.categories.create') }}" class="btn-accent">Add Category</a>
</div>

<div class="admin-card overflow-hidden p-0">
    <table class="w-full text-left text-sm">
        <thead class="border-b border-white/5 bg-white/5">
            <tr>
                <th class="px-6 py-3 font-medium text-gray-400">Name</th>
                <th class="px-6 py-3 font-medium text-gray-400">Slug</th>
                <th class="px-6 py-3 font-medium text-gray-400">Projects</th>
                <th class="px-6 py-3 font-medium text-gray-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr class="border-b border-white/5 hover:bg-white/5">
                    <td class="px-6 py-4 font-medium text-white">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $category->slug }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $category->projects_count }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-accent hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category) }}" class="inline ml-3" onsubmit="return confirm('Delete this category?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">No categories yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $categories->links() }}</div>
@endsection
