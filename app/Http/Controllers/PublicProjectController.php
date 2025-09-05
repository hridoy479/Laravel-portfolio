<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class PublicProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $project->load(['comments.user', 'likes']); // Eager load comments and their users, and likes
        return view('projects.show', compact('project'));
    }
}