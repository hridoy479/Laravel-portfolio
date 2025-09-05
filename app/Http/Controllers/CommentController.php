<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'commentable_id' => 'required|integer',
            'commentable_type' => 'required|string',
        ]);

        $model = null;
        if ($request->commentable_type === 'App\\Models\\Blog') {
            $model = Blog::findOrFail($request->commentable_id);
        } elseif ($request->commentable_type === 'App\\Models\\Project') {
            $model = Project::findOrFail($request->commentable_id);
        }

        if (!$model) {
            return back()->with('error', 'Invalid commentable type.');
        }

        $comment = new Comment([
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        $model->comments()->save($comment);

        return back()->with('success', 'Comment added successfully!');
    }

    public function destroy(Comment $comment)
    {
        if ($comment->user_id !== Auth::id() && !Auth::user()->isAdmin()) { // Assuming you have an isAdmin method on your User model
            return back()->with('error', 'You are not authorized to delete this comment.');
        }

        $comment->delete();

        return back()->with('success', 'Comment deleted successfully!');
    }
}