@extends('layouts.dashboard')

@section('title', 'Search Results | CodeCraft')
@section('header', 'Search Results for "{{ $query }}"')

@section('content')
<div class="space-y-6">

    @if($blogs->isEmpty() && $projects->isEmpty() && $users->isEmpty())
        <div class="bg-gray-800 p-6 rounded-lg shadow-md text-center text-gray-400">
            No results found for "{{ $query }}".
        </div>
    @else
        <!-- Blog Results -->
        @if(!$blogs->isEmpty())
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Blogs ({{ $blogs->count() }})</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($blogs as $blog)
                        <div class="bg-gray-700 p-4 rounded-md">
                            <h4 class="text-lg font-bold">{{ $blog->title }}</h4>
                            <p class="text-gray-400 text-sm">{{ Str::limit(strip_tags($blog->content), 100) }}</p>
                            <a href="{{ route('admin.blog.index') }}" class="text-red-500 hover:underline text-sm mt-2 inline-block">View Blog</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Project Results -->
        @if(!$projects->isEmpty())
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Projects ({{ $projects->count() }})</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($projects as $project)
                        <div class="bg-gray-700 p-4 rounded-md">
                            <h4 class="text-lg font-bold">{{ $project->name }}</h4>
                            <p class="text-gray-400 text-sm">{{ Str::limit(strip_tags($project->description), 100) }}</p>
                            <a href="{{ route('dashboard.project') }}" class="text-red-500 hover:underline text-sm mt-2 inline-block">View Project</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- User Results -->
        @if(!$users->isEmpty())
            <div class="bg-gray-800 p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Users ({{ $users->count() }})</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($users as $user)
                        <div class="bg-gray-700 p-4 rounded-md">
                            <h4 class="text-lg font-bold">{{ $user->name }}</h4>
                            <p class="text-gray-400 text-sm">{{ $user->email }}</p>
                            <a href="{{ route('admin.users.index') }}" class="text-red-500 hover:underline text-sm mt-2 inline-block">View User</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endif

</div>
@endsection
