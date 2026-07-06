@extends('admin.layouts.app')

@section('title', 'Edit Social Link')
@section('heading', 'Edit Social Link')

@section('content')
<form method="POST" action="{{ route('admin.social-links.update', $socialLink) }}" class="admin-card max-w-lg space-y-5">
    @csrf @method('PUT')
    @include('admin.social-links._form')
    <button type="submit" class="btn-accent">Update Link</button>
</form>
@endsection
