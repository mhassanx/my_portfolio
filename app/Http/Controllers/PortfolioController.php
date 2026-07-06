<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\SocialLink;

class PortfolioController extends Controller
{
    public function index()
    {
        $profile = Profile::current();
        $skills = Skill::orderBy('sort_order')->get();
        $categories = Category::withCount('projects')->orderBy('name')->get();
        $projects = Project::with('category')->latest()->get();
        $socialLinks = SocialLink::orderBy('sort_order')->get();

        return view('portfolio.index', compact(
            'profile',
            'skills',
            'categories',
            'projects',
            'socialLinks'
        ));
    }
}
