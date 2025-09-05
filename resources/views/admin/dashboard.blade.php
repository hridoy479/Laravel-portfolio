@extends('layouts.dashboard')

@section('title', 'Dashboard | CodeCraft')
@section('header', 'Dashboard Overview')

@section('content')
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 flex items-center justify-between hover:border-red-500 transition">
            <div>
                <h3 class="text-xl font-semibold mb-2">Projects</h3>
                <p class="text-gray-400 text-3xl font-bold">{{ $totalProjects }}</p>
            </div>
            <div class="text-red-500 text-4xl">
                <i class="fas fa-rocket"></i>
            </div>
        </div>
        <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 flex items-center justify-between hover:border-red-500 transition">
            <div>
                <h3 class="text-xl font-semibold mb-2">Blog Posts</h3>
                <p class="text-gray-400 text-3xl font-bold">{{ $totalBlogs }}</p>
            </div>
            <div class="text-red-500 text-4xl">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
        <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 flex items-center justify-between hover:border-red-500 transition">
            <div>
                <h3 class="text-xl font-semibold mb-2">Users</h3>
                <p class="text-gray-400 text-3xl font-bold">{{ $totalUsers }}</p>
            </div>
            <div class="text-red-500 text-4xl">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

    <!-- Recent Projects Table -->
    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700 mb-8">
        <h3 class="text-xl font-semibold mb-4">Recent Projects</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-gray-200">
                <thead>
                    <tr class="border-b border-gray-700">
                        <th class="px-4 py-2 text-left">Project Name</th>
                        <th class="px-4 py-2 text-left">Status</th>
                        <th class="px-4 py-2 text-left">Created At</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentProjects ?? [] as $project)
                    <tr class="border-b border-gray-700 hover:bg-gray-700 transition">
                        <td class="px-4 py-2">{{ $project->name }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 rounded-full text-sm {{ $project->status == 'active' ? 'bg-green-600 text-white' : 'bg-gray-600 text-gray-200' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $project->created_at->format('d M, Y') }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="#" class="bg-red-500 px-3 py-1 rounded-md text-white hover:bg-red-600 transition">View</a>
                            <a href="#" class="bg-gray-600 px-3 py-1 rounded-md text-gray-200 hover:bg-gray-700 transition">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                    @if(empty($recentProjects))
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-400">No recent projects</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Blog Posts -->
    <div class="bg-gray-800 p-6 rounded-xl border border-gray-700">
        <h3 class="text-xl font-semibold mb-4">Recent Blog Posts</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($recentBlogs ?? [] as $blog)
            <div class="bg-gray-900 p-4 rounded-lg hover:border-red-500 border border-gray-700 transition">
                <h4 class="text-lg font-bold mb-2">{{ $blog->title }}</h4>
                <p class="text-gray-400 mb-2">{{ Str::limit($blog->excerpt, 100) }}</p>
                <div class="flex justify-between items-center text-gray-400 text-sm">
                    <span>{{ $blog->created_at->format('d M, Y') }}</span>
                    <a href="{{ route('blog.show', $blog->id) }}" class="text-red-500 hover:text-red-400 transition">Read More</a>
                </div>
            </div>
            @endforeach
            @if(empty($recentBlogs))
                <p class="text-gray-400">No recent blog posts.</p>
            @endif
        </div>
    </div>
@endsection
