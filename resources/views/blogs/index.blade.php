@extends('layouts.app')

@section('title', 'Our Blog | CodeCraft')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-12">Latest Blog Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($blogs as $blog)
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                @if($blog->image)
                    <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-48 object-cover" loading="lazy">
                @else
                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-400">No Image</div>
                @endif
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">{{ $blog->title }}</h2>
                    <p class="text-gray-400 text-sm mb-4">{{ $blog->created_at->format('M d, Y') }} by {{ $blog->author ?? 'Admin' }}</p>
                    <p class="text-gray-300 mb-4">{{ Str::limit(strip_tags($blog->content), 150) }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="text-red-500 hover:underline">Read More</a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-400">
                No blog posts found.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $blogs->links() }}
    </div>
</div>
@endsection
