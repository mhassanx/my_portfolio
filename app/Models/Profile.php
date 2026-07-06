<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'name',
    'title',
    'tagline',
    'bio',
    'profile_image',
    'hero_image',
    'resume_link',
])]
class Profile extends Model
{
    /** Return the singleton profile row, creating a default if missing. */
    public static function current(): self
    {
        return static::firstOrCreate([], [
            'name' => 'Your Name',
            'title' => 'Full Stack Developer',
            'tagline' => 'Building digital experiences with clean code.',
            'bio' => 'Update your bio from the admin panel.',
        ]);
    }

    public function getProfileImageUrlAttribute(): ?string
    {
        if (! $this->profile_image) {
            return null;
        }

        return Storage::disk('public')->url($this->profile_image);
    }

    public function getHeroImageUrlAttribute(): ?string
    {
        if (! $this->hero_image) {
            return null;
        }

        return Storage::disk('public')->url($this->hero_image);
    }
}
