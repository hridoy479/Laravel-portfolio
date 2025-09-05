@extends('layouts.dashboard')

@section('title', 'Projects | CodeCraft')
@section('header', 'Projects')

@section('content')
<!-- Create Project Button -->
<button class="bg-red-500 text-left px-10 py-4 my-5 rounded-md hover:bg-red-600">
    <a href="{{ route('project.create') }}">
        ➕ Create new project
    </a>
</button>

<!-- Projects Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($projects as $project)
    <div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
        <img src="{{ $project->image ? asset('storage/'.$project->image) : 'https://via.placeholder.com/400x200' }}" 
             alt="{{ $project->name }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <h3 class="text-lg font-semibold mb-2">{{ $project->name }}</h3>
            <p class="text-gray-300 mb-2">Owner: {{ $project->owner }}</p>
            <p class="text-gray-400 text-sm">Status: {{ $project->status }}</p>
        </div>
    </div>
    @endforeach
</div>

<!-- Projects Table -->
<div class="mt-8 bg-gray-800 p-4 rounded-lg shadow-md overflow-x-auto">
    <h3 class="text-lg font-semibold mb-4">Project List</h3>
    <table class="min-w-full table-auto border-collapse">
        <thead>
            <tr class="bg-gray-700 text-gray-100">
                <th class="px-4 py-2 text-left">ID</th>
                <th class="px-4 py-2 text-left">Project Name</th>
                <th class="px-4 py-2 text-left">Owner</th>
                <th class="px-4 py-2 text-left">Status</th>
                <th class="px-4 py-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projects as $project)
            <tr class="border-b border-gray-700">
                <td class="px-4 py-2">{{ $project->id }}</td>
                <td class="px-4 py-2">{{ $project->name }}</td>
                <td class="px-4 py-2">{{ $project->owner }}</td>
                <td class="px-4 py-2">{{ $project->status }}</td>
                <td class="px-4 py-2 space-x-2">
                    <a href="{{ route('project.edit', $project) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('project.destroy', $project) }}" method="POST" class="inline-block" 
                          onsubmit="return confirm('Are you sure you want to delete this project?');">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
