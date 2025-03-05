@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Edit Role</h1>
    <form action="{{ route('role.update', $role->role_id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="role_name" class="block text-sm font-medium text-gray-700">Role Name</label>
            <input type="text" name="role_name" id="role_name" value="{{ $role->role_name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
        </div>
        <div class="mb-4">
            <label for="role_description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="role_description" id="role_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>{{ $role->role_description }}</textarea>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
