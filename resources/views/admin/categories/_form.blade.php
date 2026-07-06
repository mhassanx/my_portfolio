<div>
    <label class="admin-label">Name</label>
    <input type="text" name="name" value="{{ old('name', optional($category)->name) }}" required class="admin-input">
    @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>
<div>
    <label class="admin-label">Slug (optional — auto-generated from name)</label>
    <input type="text" name="slug" value="{{ old('slug', optional($category)->slug) }}" class="admin-input">
    @error('slug') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>
