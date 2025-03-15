@extends('layouts.app')

@section('content')
<div class="min-h-screen">
    <div class="flex w-full items-center justify-center px-16">
        <div class="w-64 flex-none">
            <img src="{{ asset('images/company-logo.png') }}" alt="Company Logo" class="w-64 h-64">
        </div>
        <div class="w-64 flex-auto">
            <p class="mt-4">{{ $parameter->general_parameter_value }}</p>
        </div>
    </div>

    <div class="mx-auto px-16">
        <h1 class="text-2xl font-bold mb-4">Produk yang Tersedia</h1>
    </div>

    <div class="flex items-center justify-center mx-auto px-16">
        <div class="grid grid-cols-4 xs:grid-cols-1 sm:grid-cols-3 gap-4">
            @foreach ($products as $product)
                <a href="{{ route('product.detail', $product->product_id) }}">
                    <div class="bg-white rounded-lg shadow-md p-4 card">
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
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection
