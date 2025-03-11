@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="flex w-full">
        <div class="flex-1 py-8 px-8">
        </div>
        <div class="flex-1 py-8 px-8">
        <h1 class="text-2xl font-bold mb-4">Buat Pengguna</h1>
            <form action="{{ route('user.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Nama') }}</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Alamat Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="role_id" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                    <select name="role_id" id="role_id" class="shadow appearance-none border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($roles as $role)
                            <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-32 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Create</button>
                </div>
            </form>
        </div>
        <div class="flex-1 py-8 px-8">
        </div>
    </div>
</div>
@endsection
