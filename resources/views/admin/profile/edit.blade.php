@extends('admin.layouts.app')

@section('title', 'Profile / About')
@section('heading', 'Profile / About')

@section('content')
<form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="admin-card max-w-2xl space-y-5">
    @csrf @method('PUT')

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label class="admin-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $profile->name) }}" required class="admin-input">
        </div>
        <div>
            <label class="admin-label">Title / Role</label>
            <input type="text" name="title" value="{{ old('title', $profile->title) }}" required class="admin-input">
        </div>
    </div>

    <div>
        <label class="admin-label">Tagline (Hero section)</label>
        <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline) }}" class="admin-input">
    </div>

    <div>
        <label class="admin-label">Bio</label>
        <textarea name="bio" rows="6" class="admin-input">{{ old('bio', $profile->bio) }}</textarea>
    </div>

    <div>
        <label class="admin-label">Resume Link</label>
        <input type="url" name="resume_link" value="{{ old('resume_link', $profile->resume_link) }}" class="admin-input" placeholder="https://">
    </div>

    <div class="grid gap-5 sm:grid-cols-2">
        <div>
            <label class="admin-label">Profile Image</label>
            @if ($profile->profile_image)
                <img src="{{ $profile->profile_image_url }}" alt="" class="mb-2 h-24 w-24 rounded-full object-cover">
            @endif
            <input type="file" name="profile_image" accept="image/*" class="admin-input file:mr-4 file:rounded file:border-0 file:bg-accent file:px-4 file:py-1 file:text-sm file:text-white">
        </div>
        <div>
            <label class="admin-label">Hero Image</label>
            @if ($profile->hero_image)
                <img src="{{ $profile->hero_image_url }}" alt="" class="mb-2 h-24 w-32 rounded object-cover">
            @endif
            <input type="file" name="hero_image" accept="image/*" class="admin-input file:mr-4 file:rounded file:border-0 file:bg-accent file:px-4 file:py-1 file:text-sm file:text-white">
        </div>
    </div>

    <button type="submit" class="btn-accent">Save Profile</button>
</form>
@endsection
