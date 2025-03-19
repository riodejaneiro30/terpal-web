@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full px-4 sm:px-8 lg:px-16 py-8">
    <div class="flex flex-col sm:flex-row gap-8 mx-auto">
        <div class="w-full sm:w-1-5 px-4">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-4">Filter</h2>
                <form id="filterForm" action="{{ route('catalog.index') }}" method="GET">
                    <div class="mb-4">
                        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Cari nama produk</label>
                        <input type="text" name="search" id="search" placeholder="Masukkan nama produk"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="mb-4">
                        <span class="block text-sm font-medium text-gray-700 mb-2">Kategori</span>
                        <div class="space-y-2">
                            @foreach ($categories as $category)
                                <div class="flex items-center">
                                    <input type="checkbox" name="categories[]" id="category_{{ $category->product_category_id }}" value="{{ $category->product_category_id }}"
                                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="category_{{ $category->product_category_id }}" class="ml-2 text-sm text-gray-700">{{ $category->product_category_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="product_color" class="block text-sm font-medium text-gray-700 mb-2">Warna</label>
                        <input type="text" name="product_color" id="product_color" placeholder="Masukkan warna produk"
                               class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                    <div class="mb-4">
                        <span class="block text-sm font-medium text-gray-700 mb-2">Rentang harga (dalam Rupiah)</span>
                        <div class="space-y-2">
                            <input type="number" name="min_price" id="min_price"  value="0" placeholder="Harga Minimum"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            <input type="number" name="max_price" id="max_price" value="999999999" placeholder="Harga Maksimum"
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                    </div>

                    <button type="submit" class="block w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Terapkan Filter
                    </button>

                    <button type="button" id="resetFilter" class="block w-full bg-[#80C0CE] mt-2 text-white py-2 px-4 rounded-md">
                        Reset Filter
                    </button>
                </form>
            </div>
        </div>

        <div class="w-full sm:w-4-5 px-4">
            <h1 class="text-2xl font-bold mb-4">Katalog Produk</h1>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach ($products as $product)
                <a href="{{ route('product.detail', $product->product_id) }}">
                    <div class="bg-white rounded-lg shadow-md p-4 w-full h-80 flex flex-col justify-between">
                        <!-- Gambar Produk -->
                        <div class="flex justify-center">
                            @if ($product->product_image)
                                <img src="data:image/png;base64,{{ $product->product_image }}"
                                     alt="Product"
                                     class="w-48 h-48 object-cover">
                            @else
                                <img src="{{ asset('images/empty-pic.png') }}"
                                     alt="Product"
                                     class="w-48 h-48 object-cover">
                            @endif
                        </div>

                        <!-- Detail Produk -->
                        <div>
                            <h2 class="text-xl font-semibold">{{ $product->product_name }}</h2>
                            <p class="py-2 text-gray-600">
                                Ukuran : {{ rtrim(rtrim(number_format($product->length, 2, '.', ''), '0'), '.') }} meter X
                                {{ rtrim(rtrim(number_format($product->width, 2, '.', ''), '0'), '.') }} meter
                            </p>
                            <p class="text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('resetFilter').addEventListener('click', function() {
        // Reset form filter
        document.getElementById('filterForm').reset();
        document.getElementById('filterForm').submit();
    });
</script>
@endsection
