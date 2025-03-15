@extends('layouts.app')

@section('content')
<div class="min-h-screen w-full px-16 py-8">
    <div class="mx-auto">
        <h1 class="text-2xl font-bold mb-4">Katalog Produk</h1>

        <div class="grid grid-cols-4 xs:grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md p-4">
                @if ($product->product_image)
                <img src="data:image/png;base64,{{ $product->product_image }}"
                        alt="Product"
                        class="py-2 w-48 h-48 object-cover rounded-md">
                @else
                <img src="{{ asset('images/empty-pic.png') }}"
                        alt="Product"
                        class="py-2 w-48 h-48 object-cover rounded-md">
                @endif
                    <h2 class="text-xl font-semibold">{{ $product->product_name }}</h2>
                    <p class="py-2 text-gray-600">Ukuran : {{ rtrim(rtrim(number_format($product->length, 2, '.', ''), '0'), '.') }} meter X {{ rtrim(rtrim(number_format($product->width, 2, '.', ''), '0'), '.') }} meter</p>
                    <p class="text-gray-600">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
