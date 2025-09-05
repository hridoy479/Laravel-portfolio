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

        <div class="mt-8">
            <a href="{{ route('projects.index') }}" class="text-red-500 hover:underline">&larr; Back to Projects</a>
        </div>
    </article>
</div>
@endsection
