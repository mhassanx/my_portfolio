<div>
    <label class="admin-label">Name</label>
    <input type="text" name="name" value="{{ old('name', optional($skill)->name) }}" required class="admin-input">
    @error('name') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>
<div>
    <label class="admin-label">Icon Class (identifier for display)</label>
    <input type="text" name="icon_class" value="{{ old('icon_class', optional($skill)->icon_class) }}" class="admin-input" placeholder="laravel, react, javascript">
</div>
<div>
    <label class="admin-label">Sort Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', optional($skill)->sort_order ?? 0) }}" min="0" class="admin-input">
</div>
<div>
    <label class="admin-label">Icon Image (optional)</label>
    @if (isset($skill) && $skill->icon_path)
        <img src="{{ $skill->icon_url }}" alt="" class="mb-2 h-12 w-12 object-contain">
    @endif
    <input type="file" name="icon" accept="image/*" class="admin-input file:mr-4 file:rounded file:border-0 file:bg-accent file:px-4 file:py-1 file:text-sm file:text-white">
</div>
