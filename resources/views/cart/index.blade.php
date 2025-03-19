@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Keranjang</h1>

    <div class="flex flex-col sm:flex-row gap-8 mx-auto">
        <div class="w-full sm:w-4-5 px-4">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th class="px-5 py-3 bg-white text-center text-xs font-semibold uppercase tracking-wider">
                                #
                            </th>
                            <th class="px-5 py-3 bg-white text-center text-xs font-semibold uppercase tracking-wider">
                                Produk
                            </th>
                            <th class="px-5 py-3 bg-white text-center text-xs font-semibold uppercase tracking-wider">
                                Harga Produk
                            </th>
                            <th class="px-5 py-3 bg-white text-center text-xs font-semibold uppercase tracking-wider">
                                Jumlah
                            </th>
                            <th class="px-5 py-3 bg-white text-center text-xs font-semibold uppercase tracking-wider">
                                Total Harga
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $index => $item)
                            <tr>
                                <td class="px-5 py-5 text-center bg-white text-sm">
                                    {{ $index + 1 }}
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <div class="flex justify-center items-center">
                                        @if ($item[$index]->product->product_image)
                                            <img src="data:image/png;base64,{{ $item[$index]->product->product_image }}" alt="Product" class="py-2 w-24 h-24 object-cover rounded-md">
                                        @else
                                            <img src="{{ asset('images/empty-pic.png') }}" alt="Product" class="py-2 w-24 h-24 object-cover rounded-md">
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm text-center">
                                    Rp {{ number_format($item[$index]->product->price, 0, ',', '.') }}
                                </td>
                                <td class="px-5 py-5 bg-white text-sm">
                                    <div class="flex justify-center items-center">
                                        <form action="{{ route('cart.update', $item[$index]->cart_item_id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="px-3 py-1 bg-gray-200 rounded-l-md hover:bg-gray-300" onclick="updateQuantity('{{ $item[$index]->cart_item_id }}', -1)">-</button>
                                            <input type="number" name="quantity" id="quantity-{{ $item[$index]->cart_item_id }}" value="{{ $item[$index]->quantity }}" min="1" class="w-16 text-center border-t border-b border-gray-200" readonly>
                                            <button type="button" class="px-3 py-1 bg-gray-200 rounded-r-md hover:bg-gray-300" onclick="updateQuantity('{{ $item[$index]->cart_item_id }}', 1)">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="px-5 py-5 bg-white text-sm text-center">
                                    Rp {{ number_format($item[$index]->product->price * $item[$index]->quantity, 0, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function updateQuantity(cartItemId, change) {
        const quantityInput = document.getElementById(`quantity-${cartItemId}`);
        let newQuantity = parseInt(quantityInput.value) + change;

        if (newQuantity < 1) {
            newQuantity = 1;
        }

        quantityInput.value = newQuantity;

        const form = quantityInput.closest('form');
        form.submit();
    }
</script>
@endsection
