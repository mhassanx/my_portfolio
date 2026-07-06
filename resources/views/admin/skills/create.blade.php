@extends('admin.layouts.app')

@section('title', 'Add Skill')
@section('heading', 'Add Skill')

@section('content')
<form method="POST" action="{{ route('admin.skills.store') }}" enctype="multipart/form-data" class="admin-card max-w-lg space-y-5">
    @csrf
    @include('admin.skills._form')
    <button type="submit" class="btn-accent">Create Skill</button>
</form>
@endsection
