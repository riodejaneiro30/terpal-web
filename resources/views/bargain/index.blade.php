@extends('layouts.app')

@section('content')
<div class="min-h-screen mx-auto px-24 py-8">
    <h1 class="text-2xl font-bold mb-4">Tawar Menawar</h1>

    @if(session('success'))
        <div class="mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        #
                    </th>
                    @auth
                        @if(Auth::user()->profile->role->role_name != 'Buyer')
                        <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                            Nama Penawar
                        </th>
                        @endif
                    @endauth
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Nama Produk
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Harga Tawar
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Jumlah Stok yang Dipesan
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-5 py-3 bg-[#42A3A7] text-center text-xs font-semibold text-white uppercase tracking-wider">
                        Error Message
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bargains as $index => $bargain)
                    <tr>
                        <td class="px-5 py-5 text-center bg-white text-sm">
                            {{ $index + 1 + ($bargains->currentPage() - 1) * $bargains->perPage() }}
                        </td>
                        @auth
                        @if(Auth::user()->profile->role->role_name != 'Buyer')
                        <td class="px-5 py-5 bg-white text-center text-sm">
                            {{ $bargain->user->name }}
                        </td>
                        @endif
                        @endauth
                        <td class="px-5 py-5 bg-white text-center text-sm">
                            {{ $bargain->product->product_name }}
                        </td>
                        <td class="px-5 py-5 bg-white text-center text-sm">
                            Rp {{ number_format($bargain->offer_price, 0, ',', '.') }}
                        </td>
                        <td class="px-5 py-5 bg-white text-center text-sm">
                            {{ $bargain->offer_quantity }}
                        </td>
                        <td class="px-5 py-5 bg-white text-center text-sm">
                            {{ $bargain->status == 'SUCCESS' ? 'Berhasil' : 'Gagal' }}
                        </td>
                        <td class="px-5 py-5 bg-white text-center text-sm">
                            {{ $bargain->error_message ? $bargain->error_message : '-' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="px-5 py-5 bg-white flex flex-col xs:flex-row items-center xs:justify-between">
            {{ $bargains->links('pagination::tailwind') }}
        </div>
    </div>
</div>
@endsection
