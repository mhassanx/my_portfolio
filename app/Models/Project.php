<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'title',
    'description',
    'image_path',
    'category_id',
    'deployed_link',
    'github_link',
    'technologies',
])]
class Project extends Model
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /** Public URL for the project thumbnail. */
    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image_path) {
            return null;
        }

        return Storage::disk('public')->url($this->image_path);
    }

    /** Technologies as an array for display. */
    public function getTechnologiesListAttribute(): array
    {
        if (! $this->technologies) {
            return [];
        }

        return array_map('trim', explode(',', $this->technologies));
    }
}
