@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Stok</h1>

    @if(session('success'))
        <div class="mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="mb-4">{{ session('error') }}</div>
    @endif

    <div id="editStockModal" class="fixed hidden w-full h-100 inset-0 bg-gray-900 bg-opacity-60 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="relative mx-auto shadow-xl rounded-md bg-white max-w-md">
            <div class="flex justify-end p-2">
                <button onclick="closeEditModal()" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <div class="p-6 pt-0">
                <h2 class="text-xl font-bold mb-4 text-center">Edit Stok Produk</h2>
                <form id="editStockForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="stock_available" class="block text-gray-700 text-sm font-bold mb-2">Ketersediaan Stok</label>
                        <input type="number" name="stock_available" id="stock_available" class="mt-1 block px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="stockTable" class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Gambar Produk
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Nama Produk
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Warna
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Harga Jual
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Stok Tersedia
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Harga Nett
                    </th>
                    <th class="px-5 py-3 bg-[#80C0CE] text-center text-xs font-semibold text-white uppercase tracking-wider">
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
                            {{ $product->product_color }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $product->stock_available }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            Rp {{ number_format($product->net_price, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            <button onclick="openEditModal('{{ $product->product_id }}', '{{ $product->stock_available }}')"
                                class="text-blue-600 hover:text-blue-900 mr-2">
                                Edit
                            </button>
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

<script>
    function openEditModal(productId, currentStock) {
        document.getElementById('stock_available').value = currentStock;
        document.getElementById('editStockForm').action = `/stock/${productId}`;
        document.getElementById('editStockModal').classList.remove('hidden');
        document.getElementById('editStockModal').classList.remove('fadeOut');
        document.getElementById('editStockModal').classList.add('fadeIn');
    }

    function closeEditModal() {
        document.getElementById('editStockModal').classList.add('hidden');
        document.getElementById('editStockModal').classList.remove('fadeIn');
        document.getElementById('editStockModal').classList.add('fadeOut');
    }
</script>
@endsection