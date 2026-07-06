@extends('admin.layouts.app')

@section('title', 'Edit Project')
@section('heading', 'Edit Project')

@section('content')
<form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="admin-card max-w-2xl space-y-5">
    @csrf @method('PUT')
    @include('admin.projects._form')
    <button type="submit" class="btn-accent">Update Project</button>
</form>
@endsection
