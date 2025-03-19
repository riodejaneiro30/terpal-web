@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Detail Produk</h1>

    <div id="editBargainModal" class="fixed hidden w-full h-100 inset-0 bg-gray-900 bg-opacity-60 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="relative mx-auto shadow-xl rounded-md bg-white max-w-md">
            <div class="flex justify-end p-2">
                <button onclick="closeBargainModal()" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 pt-0">
                <h2 class="text-xl font-bold mb-4 text-center">Masukkan Tawaran</h2>
                <form id="editBargainForm" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="offer_price" class="block text-gray-700 text-sm font-bold mb-2">Harga (dalam Rupiah)</label>
                        <input type="number" name="offer_price" id="offer_price" class="mt-1 block px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="offer_stock" class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
                        <input type="number" name="offer_stock" id="offer_stock" class="mt-1 block px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" id="processBargainButton" class="bg-blue-600 text-white px-4 py-2 rounded-md">Process</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="editCartModal" class="fixed hidden w-full h-100 inset-0 bg-gray-900 bg-opacity-60 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="relative mx-auto shadow-xl rounded-md bg-white max-w-md">
            <div class="flex justify-end p-2">
                <button onclick="closeCartModal()" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 pt-0">
                <h2 class="text-xl font-bold mb-4 text-center">Masukkan Jumlah Stok</h2>
                <span class="block text-sm font-medium text-gray-700 mb-2">Stok: {{ $product->stock_available }}</span>
                <form id="editCartForm" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="cart_stock" class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
                        <input type="number" name="cart_stock" id="cart_stock" class="mt-1 block px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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
                <h3 class="text-2xl font-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                @if(session('success'))
                    <h3 class="text-[#159A50] font-semibold mb-4">{{ session('success') }}</h3>
                @endif
                @if(session('error'))
                    <h3 class="text-red-500 font-semibold mb-4">{{ session('error') }}</h3>
                @endif
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
                    <button onclick="openCartModal('{{ $product->product_id }}')" class="bg-blue-500 text-white xs:mt-2 px-6 py-2 rounded-md">
                        Tambah ke Keranjang
                    </button>
                    <button onclick="openBargainModal('{{ $product->product_id }}')" class="bg-[#80C0CE] text-white xs:mt-2 px-6 py-2 rounded-md">
                        Tawar
                    </button>
                    <button class="bg-green-600 text-white xs:mt-2 px-6 py-2 rounded-md">
                        Beli
                    </button>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>

<script>
    function openBargainModal(productId) {
        document.getElementById('editBargainForm').action = `/bargain/${productId}/create`;
        document.getElementById('editBargainModal').classList.remove('hidden');
        document.getElementById('editBargainModal').classList.remove('fadeOut');
        document.getElementById('editBargainModal').classList.add('fadeIn');

        const processButton = document.getElementById('processBargainButton');
        processButton.disabled = true;
        processButton.classList.add('opacity-50', 'cursor-not-allowed');
    }

    function closeBargainModal() {
        document.getElementById('editBargainModal').classList.add('hidden');
        document.getElementById('editBargainModal').classList.remove('fadeIn');
        document.getElementById('editBargainModal').classList.add('fadeOut');
    }

    function openCartModal(productId) {
        document.getElementById('editCartForm').action = `/cart/${productId}/create`;
        document.getElementById('editCartModal').classList.remove('hidden');
        document.getElementById('editCartModal').classList.remove('fadeOut');
        document.getElementById('editCartModal').classList.add('fadeIn');
    }

    function closeCartModal() {
        document.getElementById('editCartModal').classList.add('hidden');
        document.getElementById('editCartModal').classList.remove('fadeIn');
        document.getElementById('editCartModal').classList.add('fadeOut');
    }

    document.getElementById('offer_stock').addEventListener('input', function() {
        const minStock = {{ $product->min_stock }};
        const offerStock = parseInt(this.value, 10);
        const processButton = document.getElementById('processBargainButton');

        if (offerStock < minStock) {
            processButton.disabled = true;
            processButton.classList.add('opacity-50', 'cursor-not-allowed');
        } else {
            processButton.disabled = false;
            processButton.classList.remove('opacity-50', 'cursor-not-allowed');
        }
    });
</script>
@endsection
