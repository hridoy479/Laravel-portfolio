<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class PublicBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'published')->latest()->paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        $blog->load(['comments.user', 'likes']); // Eager load comments and their users, and likes
        return view('blogs.show', compact('blog'));
    }
}