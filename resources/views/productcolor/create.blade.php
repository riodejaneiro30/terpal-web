@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="flex w-full">
        <div class="flex-1 py-8 px-4">
        </div>
        <div class="flex-1 py-8 px-8">
            <h1 class="text-2xl font-bold mb-4">Tambah Warna Produk</h1>
            <form action="{{ route('productcolor.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
                @csrf
                <div class="mb-4">
                    <label for="product_color" class="block text-sm font-medium text-gray-700">Warna Produk</label>
                    <input type="text" name="product_color" id="product_color" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="w-32 bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Tambah</button>
                </div>
            </form>
        </div>
        <div class="flex-1 py-8 px-4">
        </div>
    </div>
</div>
@endsection
