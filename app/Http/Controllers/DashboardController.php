<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Blog; // Import Blog model

class DashboardController extends Controller
{
    // Show admin dashboard
    public function index()
    {
        $totalBlogs = \App\Models\Blog::count();
        $totalProjects = \App\Models\Project::count();
        $totalUsers = \App\Models\User::count();
        
        // Fetch latest blog posts
        $latestBlogs = Blog::where('status', 'published')
                            ->latest()
                            ->take(5) // Get the 5 latest published blogs
                            ->get();

        return view('admin.dashboard', compact('totalBlogs', 'totalProjects', 'totalUsers', 'latestBlogs'));
    }

    // Show all projects
    public function project()
    {
        $projects = Project::latest()->get();
        return view('admin.project.index', compact('projects'));
    }

    // Show create project form
    public function createProject()
    {
        return view('admin.project.create');
    }

    // Store new project
    public function projectStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:pending,in-progress,completed',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('dashboard.project')->with('success', 'Project created successfully!');
    }

    // Show edit project form
    public function editProject(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    // Update existing project
    public function updateProject(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:pending,in-progress,completed',
        ]);

        $data = $request->only(['name', 'description', 'status']);

        if ($request->hasFile('image')) {
            if ($project->image) {
                \Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('dashboard.project')->with('success', 'Project updated successfully!');
    }

    // Delete project
    public function deleteProject(Project $project)
    {
        if ($project->image) {
            \Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('dashboard.project')->with('success', 'Project deleted successfully!');
    }
}