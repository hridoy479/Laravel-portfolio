@extends('layouts.app')

@section('title', $blog->title . ' | CodeCraft')

@section('content')
<div class="container mx-auto px-4 py-8">
    <article class="bg-gray-800 rounded-lg shadow-lg p-6">
        <h1 class="text-4xl font-bold mb-4">{{ $blog->title }}</h1>
        <p class="text-gray-400 text-sm mb-6">Published on {{ $blog->created_at->format('M d, Y') }} by {{ $blog->author ?? 'Admin' }}</p>

        @if($blog->image)
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-full h-64 object-cover rounded-md mb-6" loading="lazy">
        @endif

        <div class="prose prose-invert max-w-none text-gray-300 leading-relaxed">
            {!! $blog->content !!}
        </div>

        <div class="mt-8">
            <a href="{{ route('blogs.index') }}" class="text-red-500 hover:underline">&larr; Back to Blogs</a>
        </div>
    </article>
</div>
@endsection
