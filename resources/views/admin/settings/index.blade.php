@extends('layouts.dashboard')

@section('title', 'Settings | CodeCraft')
@section('header', 'Website Settings')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-600 text-white rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-600 text-white rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Site Name -->
        <div>
            <label for="site_name" class="block text-sm font-medium text-gray-200">Site Name</label>
            <input type="text" id="site_name" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <!-- Site Description -->
        <div>
            <label for="site_description" class="block text-sm font-medium text-gray-200">Site Description</label>
            <textarea id="site_description" name="site_description" rows="4"
                      class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">{{ old('site_description', $settings['site_description'] ?? '') }}</textarea>
        </div>

        <!-- Contact Email -->
        <div>
            <label for="contact_email" class="block text-sm font-medium text-gray-200">Contact Email</label>
            <input type="email" id="contact_email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <!-- Contact Phone -->
        <div>
            <label for="contact_phone" class="block text-sm font-medium text-gray-200">Contact Phone</label>
            <input type="text" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md font-medium transition">
                Save Settings
            </button>
        </div>
    </form>
</div>
@endsection
