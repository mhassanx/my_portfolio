<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('sort_order')->paginate(15);

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon_class' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('icon')) {
            $data['icon_path'] = $request->file('icon')->store('skills', 'public');
        }

        unset($data['icon']);
        Skill::create($data);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill created successfully.');
    }

    public function edit(Skill $skill)
    {
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'icon_class' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'image', 'max:2048'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($request->hasFile('icon')) {
            if ($skill->icon_path) {
                Storage::disk('public')->delete($skill->icon_path);
            }
            $data['icon_path'] = $request->file('icon')->store('skills', 'public');
        }

        unset($data['icon']);
        $skill->update($data);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill updated successfully.');
    }

    public function destroy(Skill $skill)
    {
        if ($skill->icon_path) {
            Storage::disk('public')->delete($skill->icon_path);
        }

        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
