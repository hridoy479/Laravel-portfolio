@extends('layouts.app')

@section('title', $project->name . ' | CodeCraft')

@section('content')
<div class="container mx-auto px-4 py-8">
    <article class="bg-gray-800 rounded-lg shadow-lg p-6">
        <h1 class="text-4xl font-bold mb-4">{{ $project->name }}</h1>
        <p class="text-gray-400 text-sm mb-6">Status: <span class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-full uppercase font-semibold tracking-wide">{{ $project->status }}</span></p>

        @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-64 object-cover rounded-md mb-6" loading="lazy">
        @endif

        <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed">
            {!! $project->description !!}
        </div>

        {{-- Like Section --}}
        <div class="mt-8 border-t border-gray-700 pt-4">
            <h3 class="text-xl font-semibold text-white mb-2">Likes: {{ $project->likes->count() }}</h3>
            @auth
                <form action="{{ route('likes.toggle') }}" method="POST">
                    @csrf
                    <input type="hidden" name="likeable_id" value="{{ $project->id }}">
                    <input type="hidden" name="likeable_type" value="App\Models\Project">
                    @if($project->likes->where('user_id', Auth::id())->count())
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Unlike</button>
                    @else
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Like</button>
                    @endif
                </form>
            @else
                <p class="text-gray-400">Login to like this project.</p>
            @endauth
        </div>

        {{-- Comments Section --}}
        <div class="mt-8 border-t border-gray-700 pt-4">
            <h3 class="text-xl font-semibold text-white mb-4">Comments</h3>

            {{-- Existing Comments --}}
            @forelse($project->comments as $comment)
                <div class="bg-gray-700 p-4 rounded-lg mb-4">
                    <p class="text-gray-300">{{ $comment->content }}</p>
                    <p class="text-gray-400 text-sm mt-2">
                        Comment by <span class="font-semibold">{{ $comment->user->name }}</span> on {{ $comment->created_at->format('M d, Y H:i') }}
                    </p>
                    @auth
                        @if(Auth::id() == $comment->user_id || (Auth::user()->isAdmin() ?? false)) {{-- Assuming isAdmin method --}}
                            <form action="{{ route('comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-500 text-sm mt-2">Delete</button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p class="text-gray-400">No comments yet. Be the first to comment!</p>
            @endforelse

            {{-- Add New Comment Form --}}
            @auth
                <div class="mt-6">
                    <h4 class="text-lg font-semibold text-white mb-2">Add a Comment</h4>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="commentable_id" value="{{ $project->id }}">
                        <input type="hidden" name="commentable_type" value="App\Models\Project">
                        <textarea name="content" rows="4" class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500" placeholder="Write your comment here..." required></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="mt-4 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Submit Comment</button>
                    </form>
                </div>
            @else
                <p class="text-gray-400 mt-6">Login to add a comment.</p>
            @endauth
        </div>

        <div class="mt-8">
            <a href="{{ route('projects.index') }}" class="text-red-500 hover:underline">&larr; Back to Projects</a>
        </div>
    </article>
</div>
@endsection