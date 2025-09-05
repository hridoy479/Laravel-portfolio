@extends('layouts.dashboard')

@section('title', 'Create Project | CodeCraft')

@section('header', 'Create Project')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">

    

    <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Project Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-200">Project Name</label>
            <input type="text" id="name" name="name" required
                class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-200">Description</label>
            <textarea id="description" name="description" rows="4" required
                class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Upload -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-200">Project Image</label>
            <input type="file" id="image" name="image"
                class="mt-1 block w-full text-gray-200">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-200">Status</label>
            <select id="status" name="status" required
                class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="pending">Pending</option>
                <option value="in-progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <div class="flex justify-end">
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md font-medium transition">
                Create Project
            </button>
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
