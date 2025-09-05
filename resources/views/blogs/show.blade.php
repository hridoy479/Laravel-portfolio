@extends('layouts.app')

@section('title', $blog->title . ' | CodeCraft')

@section('content')
<div class="container mx-auto px-4 py-8">
    <article class="bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6 -mx-4 sm:mx-0">
        <h1 class="text-4xl font-bold mb-4">{{ $blog->title }}</h1>
        <p class="text-gray-400 text-sm mb-6">Published on {{ $blog->created_at->format('M d, Y') }} by {{ $blog->author ?? 'Admin' }}</p>

        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-48 sm:h-64 object-cover rounded-md mb-6" loading="lazy">
        @endif

        <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed">
            {!! $blog->content !!}
        </div>

        {{-- Like Section --}}
        <div class="mt-8 border-t border-gray-700 pt-4">
            <div class="flex items-center mb-2">
                <span class="text-xl font-semibold text-white mr-2">{{ $blog->likes->count() }}</span>
                <span class="text-gray-400">Likes</span>
            </div>
            @auth
                <form action="{{ route('likes.toggle') }}" method="POST" class="inline-block">
                    @csrf
                    <input type="hidden" name="likeable_id" value="{{ $blog->id }}">
                    <input type="hidden" name="likeable_type" value="App\Models\Blog">
                    @if($blog->likes->where('user_id', Auth::id())->count())
                        <button type="submit" class="flex items-center bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                            <i class="fas fa-heart mr-2"></i> Unlike
                        </button>
                    @else
                        <button type="submit" class="flex items-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                            <i class="far fa-heart mr-2"></i> Like
                        </button>
                    @endif
                </form>
            @else
                <p class="text-gray-400">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a> to like this blog.
                </p>
            @endauth
        </div>

        {{-- Comments Section --}}
        <div class="mt-8 border-t border-gray-700 pt-4">
            <h3 class="text-xl font-semibold text-white mb-4">Comments</h3>

            {{-- Existing Comments --}}
            @forelse($blog->comments as $comment)
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
                        <input type="hidden" name="commentable_id" value="{{ $blog->id }}">
                        <input type="hidden" name="commentable_type" value="App\Models\Blog">
                        <textarea name="content" rows="4" class="w-full p-3 rounded-md bg-gray-700 text-white border border-gray-600 focus:outline-none focus:border-blue-500" placeholder="Write your comment here..." required></textarea>
                        @error('content')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="mt-4 bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Submit Comment</button>
                    </form>
                </div>
            @else
                <p class="text-gray-400 mt-6">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a> to add a comment.
                </p>
            @endauth
        </div>

        <div class="mt-8">
            <a href="{{ route('blogs.index') }}" class="text-red-500 hover:underline">&larr; Back to Blogs</a>
        </div>
    </article>
</div>
@endsection