@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Pengguna</h1>
    <div class="mb-4">
        <a href="{{ route('user.create') }}" class="w-16 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Tambah Pengguna
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Nama
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Nomor Telepon
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Role
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $user)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $index + 1 + ($users->currentPage() - 1) * $users->perPage() }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $user->name }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $user->email }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $user->profile->phone_number ?? 'N/A' }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $user->profile->role->role_name ?? 'N/A' }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            <a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $users->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
