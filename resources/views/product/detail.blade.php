@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Detail Produk</h1>

    <div class="flex mx-auto items-center justify-center">
        <div class="grid sm:grid-cols-2 xs:grid-cols-1 gap-4">
            <div class="p-4">
                @if ($product->product_image)
                <img src="data:image/png;base64,{{ $product->product_image }}"
                        alt="Product"
                        class="py-2 w-96 h-96 object-cover rounded-md">
                @else
                <img src="{{ asset('images/empty-pic.png') }}"
                        alt="Product"
                        class="py-2 w-96 h-96 object-cover rounded-md">
                @endif
            </div>
            <div class="p-4">
                <h1 class="text-2xl font-bold mb-4">{{ $product->product_name }}</h1>
                <h3 class="text-2xl font-bold mb-4">Rp {{ number_format($product->price, 2, ',', '.') }}</h3>
                <h3 class="font-semibold mb-4">Deskripsi</h3>
                <p class="text-gray-700 mb-4">{{ $product->product_description ? $product->product_description : '-' }}</p>
                <h3 class="font-semibold mb-4">Kategori</h3>
                <p class="text-gray-700 mb-4">{{ $product->category->product_category_name }}</p>
                <h3 class="font-semibold mb-4">Warna</h3>
                <p class="text-gray-700 mb-4">{{ $product->product_color }}</p>
                <h3 class="font-semibold mb-4">Ukuran</h3>
                <p class="text-gray-700 mb-4">{{ rtrim(rtrim(number_format($product->length, 2, '.', ''), '0'), '.') }} meter X {{ rtrim(rtrim(number_format($product->width, 2, '.', ''), '0'), '.') }} meter</p>

                @auth
                <div class="mt-6">
                    <button class="bg-blue-500 text-white px-6 py-2 rounded-md">
                        Tambah ke Keranjang
                    </button>
                    <button class="bg-[#80C0CE] text-white px-6 py-2 rounded-md">
                        Tawar
                    </button>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-md">
                        Beli
                    </button>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
