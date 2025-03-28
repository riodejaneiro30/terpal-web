@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-16 py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
    <div class="mb-4">
        @if(Auth::user()->profile && Auth::user()->profile->role && Auth::user()->profile->role->role_name === 'Owner')
        <a href="{{ route('product.create') }}" class="w-16 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Tambah Produk
        </a>
        @endif
    </div>

    @if(session('success'))
        <div class="mb-4">{{ session('success') }}</div>
    @endif
    <span class="block text-sm font-medium text-gray-700 mb-2">Harga per meter<sup>2</sup> berlaku untuk terpal tipe Custom </span>
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Gambar Produk
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Nama Produk
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Kategori
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Tipe
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Warna
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Harga Jual
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Stok Tersedia
                    </th>
                    @if(Auth::user()->profile && Auth::user()->profile->role && Auth::user()->profile->role->role_name === 'Owner')
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Harga Nett
                    </th>
                    @endif
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                        {{ $index + 1 + ($products->currentPage() - 1) * $products->perPage() }}
                        </td>
                        <td class="px-5 py-5 bg-white text-sm">
                            @if ($product->product_image)
                            <img src="data:image/png;base64,{{ $product->product_image }}"
                                    alt="Product"
                                    class="py-2 w-16 h-16 object-cover rounded-md">
                            @else
                            <img src="{{ asset('images/empty-pic.png') }}"
                                    alt="Product"
                                    class="py-2 w-16 h-16 object-cover rounded-md">
                            @endif
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $product->product_name }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $product->category->product_category_name }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $product->type }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $product->product_color }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $product->stock_available }}
                        </td>
                        @if(Auth::user()->profile && Auth::user()->profile->role && Auth::user()->profile->role->role_name === 'Owner')
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            Rp {{ number_format($product->net_price, 0, ',', '.') }}
                        </td>
                        @endif
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            <a href="{{ route('product.edit', $product->product_id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                            @if(Auth::user()->profile && Auth::user()->profile->role && Auth::user()->profile->role->role_name === 'Owner')
                                <form action="{{ route('product.destroy', $product->product_id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection