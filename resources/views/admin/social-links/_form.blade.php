<div>
    <label class="admin-label">Platform Name</label>
    <input type="text" name="platform_name" value="{{ old('platform_name', optional($socialLink)->platform_name) }}" required class="admin-input">
</div>
<div>
    <label class="admin-label">URL</label>
    <input type="url" name="url" value="{{ old('url', optional($socialLink)->url) }}" required class="admin-input">
</div>
<div>
    <label class="admin-label">Icon identifier (github, linkedin, twitter)</label>
    <input type="text" name="icon" value="{{ old('icon', optional($socialLink)->icon) }}" class="admin-input">
</div>
<div>
    <label class="admin-label">Sort Order</label>
    <input type="number" name="sort_order" value="{{ old('sort_order', optional($socialLink)->sort_order ?? 0) }}" min="0" class="admin-input">
</div>
