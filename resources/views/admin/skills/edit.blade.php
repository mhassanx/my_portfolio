@extends('admin.layouts.app')

@section('title', 'Edit Skill')
@section('heading', 'Edit Skill')

@section('content')
<form method="POST" action="{{ route('admin.skills.update', $skill) }}" enctype="multipart/form-data" class="admin-card max-w-lg space-y-5">
    @csrf @method('PUT')
    @include('admin.skills._form')
    <button type="submit" class="btn-accent">Update Skill</button>
</form>
@endsection
