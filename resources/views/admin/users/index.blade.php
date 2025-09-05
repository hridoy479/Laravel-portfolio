@extends('layouts.dashboard')

@section('title', 'User Management | CodeCraft')
@section('header', 'User Management')

@section('content')
<div class="space-y-6">

    <!-- Table -->
    <div class="bg-gray-800 p-4 rounded-lg shadow-md overflow-x-auto">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-600 text-white rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-white">All Users</h3>
            <a href="{{ route('admin.users.create') }}" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md text-white font-medium transition">
                Create User
            </a>
        </div>

        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-700 text-left text-gray-100">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Role</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="border-b border-gray-700">
                        <td class="px-4 py-2">{{ $user->id }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-400">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
