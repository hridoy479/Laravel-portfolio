@extends('layouts.dashboard')

@section('title', 'Edit Blog | CodeCraft')

@section('header', 'Edit Blog')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">

    

    <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Blog Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-200">Blog Title</label>
            <input type="text" id="title" name="title" value="{{ $blog->title }}" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('title')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Slug -->
        <div>
            <label for="slug" class="block text-sm font-medium text-gray-200">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ $blog->slug }}" placeholder="example-blog-title"
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
            @if($blog->image)
                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="w-16 h-16 object-cover rounded mt-2">
            @endif
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Category -->
        <div>
            <label for="category" class="block text-sm font-medium text-gray-200">Category</label>
            <select id="category" name="category" required
                    class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="technology" {{ $blog->category == 'technology' ? 'selected' : '' }}>Technology</option>
                <option value="science" {{ $blog->category == 'science' ? 'selected' : '' }}>Science</option>
                <option value="design" {{ $blog->category == 'design' ? 'selected' : '' }}>Design</option>
                <option value="other" {{ $blog->category == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Content -->
        <div>
            <label for="content" class="block text-sm font-medium text-gray-200">Content</label>
            <textarea id="content" name="content" rows="8" required
                      class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">{{ $blog->content }}</textarea>
            @error('content')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-200">Status</label>
            <select id="status" name="status" required
                    class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="draft" {{ $blog->status == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ $blog->status == 'published' ? 'selected' : '' }}>Published</option>
            </select>
            @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md font-medium transition">
                Update Blog
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