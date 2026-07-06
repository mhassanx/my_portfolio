<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable(['name', 'icon_path', 'icon_class', 'sort_order'])]
class Skill extends Model
{
    public function getIconUrlAttribute(): ?string
    {
        if (! $this->icon_path) {
            return null;
        }

        return Storage::disk('public')->url($this->icon_path);
    }
}
