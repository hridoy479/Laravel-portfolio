@extends('layouts.dashboard')

@section('title', 'Create Blog | CodeCraft')

@section('header', 'Create Blog')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">

    

    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Blog Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-200">Blog Title</label>
            <input type="text" id="title" name="title" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-200">Slug</label>
            <input type="text" id="slug" name="slug" placeholder="example-blog-title"
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('slug')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Featured Image -->
        <div>
            <label for="image" class="block text-sm font-medium text-gray-200">Featured Image</label>
            <input type="file" id="image" name="image"
                   class="mt-1 block w-full text-gray-200">
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-200">Category</label>
            <select id="category" name="category" required
                    class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="technology">Technology</option>
                <option value="science">Science</option>
                <option value="design">Design</option>
                <option value="other">Other</option>
            </select>
            @error('category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-200">Content</label>
            <textarea id="content" name="content" rows="8" required
                      class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-200">Status</label>
            <select id="status" name="status" required
                    class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md font-medium transition">
                Create Blog
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#content',
        plugins: 'advlist autolink lists link image charmap print preview anchor',
        toolbar_mode: 'floating',
    });
</script>
@endpush
