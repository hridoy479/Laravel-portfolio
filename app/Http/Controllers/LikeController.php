<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'likeable_id' => 'required|integer',
            'likeable_type' => 'required|string',
        ]);

        $model = null;
        if ($request->likeable_type === 'App\\Models\\Blog') {
            $model = Blog::findOrFail($request->likeable_id);
        } elseif ($request->likeable_type === 'App\\Models\\Project') {
            $model = Project::findOrFail($request->likeable_id);
        }

        if (!$model) {
            return back()->with('error', 'Invalid likeable type.');
        }

        $like = $model->likes()->where('user_id', Auth::id())->first();

        if ($like) {
            $like->delete();
            return back()->with('success', 'Unliked successfully!');
        } else {
            $model->likes()->create(['user_id' => Auth::id()]);
            return back()->with('success', 'Liked successfully!');
        }
    }
}