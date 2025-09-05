@extends('layouts.dashboard')

@section('title', 'Create User | CodeCraft')
@section('header', 'Create User')

@section('content')
<div class="max-w-3xl mx-auto bg-gray-800 p-6 rounded-lg shadow-md">

    

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-200">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-200">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-200">Password</label>
            <input type="password" id="password" name="password" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-200">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required
                   class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Role -->
        <div>
            <label for="role" class="block text-sm font-medium text-gray-200">Role</label>
            <select id="role" name="role" required
                    class="mt-1 block w-full px-3 py-2 bg-gray-900 border border-gray-700 rounded-md text-gray-200 focus:outline-none focus:ring-2 focus:ring-red-500">
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md font-medium transition">
                Create User
            </button>
        </div>
    </form>
</div>
@endsection
