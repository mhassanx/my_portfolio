<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Skill;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'projectCount' => Project::count(),
            'categoryCount' => Category::count(),
            'skillCount' => Skill::count(),
            'messageCount' => ContactMessage::where('is_read', false)->count(),
            'recentMessages' => ContactMessage::latest()->take(5)->get(),
        ]);
    }
}
