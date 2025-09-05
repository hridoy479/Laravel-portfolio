<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Project;
use App\Models\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $blogs = Blog::where('title', 'like', "%$query%")
                     ->orWhere('content', 'like', "%$query%")
                     ->get();

        $projects = Project::where('name', 'like', "%$query%")
                           ->orWhere('description', 'like', "%$query%")
                           ->get();

        $users = User::where('name', 'like', "%$query%")
                      ->orWhere('email', 'like', "%$query%")
                      ->get();

        return view('admin.search.index', compact('query', 'blogs', 'projects', 'users'));
    }
}
