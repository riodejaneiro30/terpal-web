@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Warna Produk</h1>
    <div class="mb-4">
        <a href="{{ route('productcolor.create') }}" class="w-16 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Tambah Warna Produk
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Warna Produk
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colors as $index => $color)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $index + 1 + ($colors->currentPage() - 1) * $colors->perPage() }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            {{ $color->product_color }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            <a href="{{ route('productcolor.edit', $color->product_color_id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                            <form action="{{ route('productcolor.destroy', $color->product_color_id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $colors->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
