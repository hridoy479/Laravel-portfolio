@extends('layouts.app')

@section('title', 'Our Projects | CodeCraft')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-center mb-12">Our Projects</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($projects as $project)
            <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden">
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-48 object-cover" loading="lazy">
                @else
                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center text-gray-400">No Image</div>
                @endif
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-2">{{ $project->name }}</h2>
                    <p class="text-gray-300 mb-4">{{ Str::limit(strip_tags($project->description), 150) }}</p>
                    <span class="inline-block bg-red-500 text-white text-xs px-2 py-1 rounded-full uppercase font-semibold tracking-wide">{{ $project->status }}</span>
                    <a href="{{ route('projects.show', $project) }}" class="text-red-500 hover:underline mt-4 block">View Project</a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-400">
                No projects found.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $projects->links() }}
    </div>
</div>
@endsection
