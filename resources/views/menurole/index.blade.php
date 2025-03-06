@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Menu Role</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Role Name
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Role Description
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $index => $role)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $index + 1 + ($roles->currentPage() - 1) * $roles->perPage() }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $role->role_name }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $role->role_description }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            <a href="{{ route('menurole.edit', $role->role_id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Assign</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $roles->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection