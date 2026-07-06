@extends('admin.layouts.app')

@section('title', 'Add Category')
@section('heading', 'Add Category')

@section('content')
<form method="POST" action="{{ route('admin.categories.store') }}" class="admin-card max-w-lg space-y-5">
    @csrf
    @include('admin.categories._form')
    <button type="submit" class="btn-accent">Create Category</button>
</form>
@endsection
