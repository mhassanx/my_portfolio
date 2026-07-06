@extends('admin.layouts.app')

@section('title', 'Edit Category')
@section('heading', 'Edit Category')

@section('content')
<form method="POST" action="{{ route('admin.categories.update', $category) }}" class="admin-card max-w-lg space-y-5">
    @csrf @method('PUT')
    @include('admin.categories._form')
    <button type="submit" class="btn-accent">Update Category</button>
</form>
@endsection
