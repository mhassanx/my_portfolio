<div>
    <label class="admin-label">Title</label>
    <input type="text" name="title" value="{{ old('title', optional($project)->title) }}" required class="admin-input">
    @error('title') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div>
    <label class="admin-label">Description</label>
    <textarea name="description" rows="4" required class="admin-input">{{ old('description', optional($project)->description) }}</textarea>
    @error('description') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div>
    <label class="admin-label">Category</label>
    <select name="category_id" required class="admin-input">
        <option value="">Select category</option>
        @foreach ($categories as $id => $name)
            <option value="{{ $id }}" @selected(old('category_id', optional($project)->category_id) == $id)>{{ $name }}</option>
        @endforeach
    </select>
    @error('category_id') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>

<div>
    <label class="admin-label">Technologies (comma separated)</label>
    <input type="text" name="technologies" value="{{ old('technologies', optional($project)->technologies) }}" class="admin-input" placeholder="Laravel, Vue.js, MySQL">
</div>

<div class="grid gap-5 sm:grid-cols-2">
    <div>
        <label class="admin-label">Live Demo URL</label>
        <input type="url" name="deployed_link" value="{{ old('deployed_link', optional($project)->deployed_link) }}" class="admin-input" placeholder="https://">
    </div>
    <div>
        <label class="admin-label">GitHub URL</label>
        <input type="url" name="github_link" value="{{ old('github_link', optional($project)->github_link) }}" class="admin-input" placeholder="https://github.com/">
    </div>
</div>

<div>
    <label class="admin-label">Project Image</label>
    @if (isset($project) && $project->image_path)
        <img src="{{ $project->image_url }}" alt="" class="mb-2 h-24 rounded object-cover">
    @endif
    <input type="file" name="image" accept="image/*" class="admin-input file:mr-4 file:rounded file:border-0 file:bg-accent file:px-4 file:py-1 file:text-sm file:text-white">
    @error('image') <p class="mt-1 text-sm text-red-400">{{ $message }}</p> @enderror
</div>
