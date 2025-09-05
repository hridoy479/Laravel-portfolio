<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class PublicBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::withCount(['comments', 'likes']) // Eager load comment and like counts
                     ->where('status', 'published')
                     ->latest()
                     ->paginate(6); // Changed from 10 to 6

        // Fetch hot topics
        $hotTopics = Blog::withCount(['comments', 'likes'])
                         ->where('status', 'published')
                         ->orderByDesc('likes_count')
                         ->orderByDesc('comments_count')
                         ->take(3) // Get top 3 hot topics
                         ->get();

        return view('blogs.index', compact('blogs', 'hotTopics'));
    }

    public function show(Blog $blog)
    {
        $blog->load(['comments.user', 'likes']); // Eager load comments and their users, and likes
        return view('blogs.show', compact('blog'));
    }
}
