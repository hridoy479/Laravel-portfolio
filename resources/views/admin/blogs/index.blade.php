@extends('layouts.dashboard')

@section('title', 'Admin Blogs | CodeCraft')
@section('header', 'Blog Dashboard')

@section('content')
<div class="space-y-6">

    <!-- Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-gray-400">Total Blogs</h3>
            <p class="text-2xl font-bold text-white">{{ $total }}</p>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-gray-400">Drafts</h3>
            <p class="text-2xl font-bold text-white">{{ $drafts }}</p>
        </div>

        <div class="bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-gray-400">Published</h3>
            <p class="text-2xl font-bold text-white">{{ $published }}</p>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-gray-800 p-4 rounded-lg shadow-md overflow-x-auto">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-600 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-white">All Blogs</h3>
            <a href="{{ route('admin.blogs.create') }}" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md text-white font-medium transition">
                Create Blog
            </a>
        </div>

        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-700 text-left text-gray-100">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Created At</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr class="border-b border-gray-700">
                        <td class="px-4 py-2">{{ $blog->id }}</td>

                        <!-- Image -->
                        <td class="px-4 py-2">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400">No Image</span>
                            @endif
                        </td>

                        <td class="px-4 py-2">{{ $blog->title }}</td>
                        <td class="px-4 py-2">{{ $blog->category }}</td>
                        <td class="px-4 py-2 capitalize">{{ $blog->status }}</td>
                        <td class="px-4 py-2">{{ $blog->created_at->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center text-gray-400">No blogs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
