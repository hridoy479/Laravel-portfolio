@extends('layouts.dashboard')

@section('title', 'Edit Project | CodeCraft')
@section('header', 'Edit Project')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-6">Edit Project</h2>

    @if(session('success'))
        <div class="bg-green-500 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('project.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Project Name -->
        <div class="mb-4">
            <label class="block text-gray-200 mb-2" for="name">Project Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}" 
                   class="w-full px-4 py-2 rounded bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label class="block text-gray-200 mb-2" for="description">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-4 py-2 rounded bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('description', $project->description) }}</textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Status -->
        <div class="mb-4">
            <label class="block text-gray-200 mb-2" for="status">Status</label>
            <select name="status" id="status"
                    class="w-full px-4 py-2 rounded bg-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="pending" {{ old('status', $project->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in-progress" {{ old('status', $project->status) == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Image -->
        <div class="mb-4">
            <label class="block text-gray-200 mb-2" for="image">Project Image</label>
            <input type="file" name="image" id="image" 
                   class="w-full text-gray-100 focus:outline-none">
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="mt-2 w-48 h-32 object-cover rounded">
            @endif
            @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Submit -->
        <div class="mt-6">
            <button type="submit" 
                    class="bg-red-500 hover:bg-red-600 px-6 py-2 rounded text-white font-medium transition">
                Update Project
            </button>
            <a href="{{ route('project.index') }}" class="ml-4 text-gray-300 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#description',
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar_mode: 'floating',
    });
</script>
@endpush
