@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Menu</h1>
    <div class="mb-4">
        <a href="{{ route('menu.create') }}" class="w-16 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Add Menu
        </a>
    </div>
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
                        Description
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $index => $menu)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $index + 1 + ($menus->currentPage() - 1) * $menus->perPage() }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $menu->menu_name }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $menu->menu_description }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            <a href="{{ route('menu.edit', $menu->menu_id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                            <form action="{{ route('menu.destroy', $menu->menu_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this menu?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $menus->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection