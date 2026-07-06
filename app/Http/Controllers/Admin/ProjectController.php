<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProjectRequest;
use App\Http\Requests\Admin\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');

        return view('admin.projects.create', compact('categories'));
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        unset($data['image']);
        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');

        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($project->image_path) {
                Storage::disk('public')->delete($project->image_path);
            }
            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        unset($data['image']);
        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
