<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        $total = $blogs->count();
        $drafts = $blogs->where('status', 'draft')->count();
        $published = $blogs->where('status', 'published')->count();

        return view('admin.blogs.index', compact('blogs', 'total', 'drafts', 'published'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'slug'     => 'nullable|string|max:255|unique:blogs',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'content'  => 'required|string',
            'status'   => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        Blog::create($data);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'slug'     => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required|string',
            'content'  => 'required|string',
            'status'   => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $data['image'] = $request->file('image')->store('blogs', 'public');
        }

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $blog->update($data);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}
