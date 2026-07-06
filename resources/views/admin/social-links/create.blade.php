@extends('admin.layouts.app')

@section('title', 'Add Social Link')
@section('heading', 'Add Social Link')

@section('content')
<form method="POST" action="{{ route('admin.social-links.store') }}" class="admin-card max-w-lg space-y-5">
    @csrf
    @include('admin.social-links._form')
    <button type="submit" class="btn-accent">Create Link</button>
</form>
@endsection
