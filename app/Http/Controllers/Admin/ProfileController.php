<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Profile::current();

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = Profile::current();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'tagline' => ['nullable', 'string', 'max:500'],
            'bio' => ['nullable', 'string'],
            'resume_link' => ['nullable', 'url', 'max:500'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
            'hero_image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('profile', 'public');
        }

        if ($request->hasFile('hero_image')) {
            if ($profile->hero_image) {
                Storage::disk('public')->delete($profile->hero_image);
            }
            $data['hero_image'] = $request->file('hero_image')->store('profile', 'public');
        }

        $profile->update($data);

        return back()->with('success', 'Profile updated successfully.');
    }
}
