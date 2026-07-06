@extends('admin.layouts.app')

@section('title', 'Add Project')
@section('heading', 'Add Project')

@section('content')
<form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="admin-card max-w-2xl space-y-5">
    @csrf
    @include('admin.projects._form')
    <button type="submit" class="btn-accent">Create Project</button>
</form>
@endsection
