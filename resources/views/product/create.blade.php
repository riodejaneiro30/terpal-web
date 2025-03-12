@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

    @if(session('success'))
        <div class="mb-4">{{ session('success') }}</div>
    @endif
    
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2">Nama Produk</label>
            <input type="text" name="product_name" id="product_name" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="product_description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Produk</label>
            <input type="text" name="product_description" id="product_description" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="product_category_id" class="block text-gray-700 text-sm font-bold mb-2">Kategori Produk</label>
            <select name="product_category_id" id="product_category_id" class="shadow border rounded w-96 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                @foreach($categories as $category)
                    <option value="{{ $category->product_category_id }}">{{ $category->product_category_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-4">
            <label for="length" class="block text-gray-700 text-sm font-bold mb-2">Panjang (dalam meter)</label>
            <input type="number" name="length" id="length" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="width" class="block text-gray-700 text-sm font-bold mb-2">Lebar (dalam meter)</label>
            <input type="number" name="width" id="width" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="product_color" class="block text-gray-700 text-sm font-bold mb-2">Warna</label>
            <input type="text" name="product_color" id="product_color" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Harga (dalam Rupiah)</label>
            <input type="number" name="price" id="price" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="stock_available" class="block text-gray-700 text-sm font-bold mb-2">Ketersediaan Stok</label>
            <input type="number" name="stock_available" id="stock_available" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div class="mb-4">
            <label for="product_image" class="block text-gray-700 text-sm font-bold mb-2">Gambar Produk</label>
            <input type="file" name="product_image" id="product_image" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="net_price" class="block text-gray-700 text-sm font-bold mb-2">Harga Nett (dalam Rupiah)</label>
            <input type="number" name="net_price" id="net_price" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="mb-4">
            <label for="min_stock" class="block text-gray-700 text-sm font-bold mb-2">Minimum Stok (Proses Negosiasi)</label>
            <input type="number" name="min_stock" id="min_stock" class="mt-1 block w-96 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="w-32 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Tambah</button>
        </div>
    </form>
</div>
@endsection