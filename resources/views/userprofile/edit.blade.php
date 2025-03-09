@extends('layouts.app')

@section('content')
<div class="min-h-screen justify-center">
    <div class="flex w-full">
        <div class="flex-1 py-8 px-4">
        </div>
        <div class="flex-1 py-8 px-8">
            <h1 class="text-2xl font-bold mb-4">Edit Profil User</h1>
            
            @if(session('success'))
                <div class="mb-4">{{ session('success') }}</div>
            @endif

            <form action="{{ route('userprofile.update', $userProfile->user_id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $userProfile->date_of_birth }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="laki-laki" {{ $userProfile->gender == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="perempuan" {{ $userProfile->gender == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="phone_number" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="phone_number" id="phone_number" value="{{ $userProfile->phone_number }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" name="address" id="address" value="{{ $userProfile->address }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-32 bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Update</button>
                </div>
            </form>
        </div>
        <div class="flex-1 py-8 px-4">
        </div>
    </div>
</div>
@endsection