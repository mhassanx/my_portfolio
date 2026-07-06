@extends('admin.layouts.app')

@section('title', 'Skills')
@section('heading', 'Skills')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <p class="text-gray-500">Manage skills shown as hexagon icons on the portfolio.</p>
    <a href="{{ route('admin.skills.create') }}" class="btn-accent">Add Skill</a>
</div>

<div class="admin-card overflow-hidden p-0">
    <table class="w-full text-left text-sm">
        <thead class="border-b border-white/5 bg-white/5">
            <tr>
                <th class="px-6 py-3 font-medium text-gray-400">Name</th>
                <th class="px-6 py-3 font-medium text-gray-400">Icon Class</th>
                <th class="px-6 py-3 font-medium text-gray-400">Order</th>
                <th class="px-6 py-3 font-medium text-gray-400 text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($skills as $skill)
                <tr class="border-b border-white/5 hover:bg-white/5">
                    <td class="px-6 py-4 font-medium text-white">{{ $skill->name }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $skill->icon_class ?? '—' }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $skill->sort_order }}</td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-accent hover:underline">Edit</a>
                        <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" class="inline ml-3" onsubmit="return confirm('Delete this skill?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-6 py-8 text-center text-gray-500">No skills yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $skills->links() }}</div>
@endsection
