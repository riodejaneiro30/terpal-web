@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Assign Menu to Role {{ $role->role_name }}</h1>
    <form action="{{ route('menurole.store', ['role_id' => $role->role_id]) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="menu_id" class="block text-gray-700 text-sm font-bold mb-2">Menu</label>
            <select name="menu_id" id="menu_id" class="shadow border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($menus as $menu)
                    <option value="{{ $menu->menu_id }}">{{ $menu->menu_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Add Menu
            </button>
        </div>
    </form>

    <br />
    <h1 class="text-2xl font-bold mb-4">Access Menu</h1>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Menu Name
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Menu Description
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuRoles as $index => $menuRole)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $index + 1 }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $menuRole->menu_name }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $menuRole->menu_description }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                        <form action="{{ route('menurole.destroy', ['role_id' => $role->role_id, 'menu_id' => $menuRole->menu_id]) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection