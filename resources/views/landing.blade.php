@extends('layouts.app')

@section('content')
<div class="min-h-screen">
    <div id="home" class="relative h-screen bg-cover bg-center flex flex-col items-center justify-center">
        <div class="absolute inset-0 bg-cover bg-center opacity-75" style="background-image: url('{{ asset('images/tarpaulin-first-page.jpeg') }}')"></div>

        <div class="relative z-10 text-center">
            <h1 class="text-4xl font-bold mb-4">PT. Chaste Gemilang Mandiri</h1>
            <p class="text-lg mb-6">Tempat jual beli terpal dengan harga kompetitif</p>
            <button id="shopButton" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                Order Sekarang
            </button>
        </div>
    </div>

    <div id="profile" class="mx-auto px-16 mt-8 fade-in">
        <h1 class="text-2xl font-bold mb-4">Tentang Kami</h1>
        <div class="flex flex-col sm:flex-row items-center gap-6">
            <img src="{{ asset('images/company-profile.jpg') }}" alt="Company Profile" class="w-full sm:w-1-2 rounded-lg shadow-lg">
            <p class="text-gray-700 sm:w-1-2">
                {{ $parameter->general_parameter_value }}
            </p>
        </div>
    </div>

    <div id="features" class="mx-auto px-16 mt-8 fade-in">
        <h1 class="text-2xl font-bold mb-4">Keunggulan Produk</h1>
        <div class="grid xs:grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold">Kualitas Terbaik</h2>
                <p class="text-gray-600">Produk kami dibuat dengan bahan-bahan pilihan yang menjamin kualitas dan ketahanan.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold">Harga Kompetitif</h2>
                <p class="text-gray-600">Kami menawarkan harga yang kompetitif tanpa mengorbankan kualitas produk.</p>
            </div>
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold">Layanan Pelanggan</h2>
                <p class="text-gray-600">Tim kami siap membantu Anda dengan layanan pelanggan yang ramah dan responsif.</p>
            </div>
        </div>
    </div>

    <div id="kinds" class="mx-auto px-16 mt-8 fade-in">
        <h1 class="text-2xl font-bold mb-4">Jenis Terpal</h1>
        <div class="grid xs:grid-cols-1 sm:grid-cols-3 gap-4">
            <!-- Terpal Plastik -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold">Terpal Plastik</h2>
                <p class="text-gray-600">
                    Terpal plastik ringan dan tahan air, cocok untuk melindungi barang dari hujan dan sinar matahari.
                </p>
            </div>

            <!-- Terpal Karet -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold">Terpal Karet</h2>
                <p class="text-gray-600">
                    Terpal karet memiliki daya tahan tinggi dan elastisitas yang baik, ideal untuk keperluan industri dan konstruksi.
                </p>
            </div>

            <!-- Terpal Kain -->
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold">Terpal Kain</h2>
                <p class="text-gray-600">
                    Terpal kain berbahan kuat dan fleksibel, sering digunakan dalam aplikasi outdoor dan pelindung tenda.
                </p>
            </div>
        </div>
    </div>

    <div id="shop" class="w-4-5 mx-auto px-16 mt-8 mb-8 fade-in">
        <h1 class="text-2xl font-bold mb-4">Produk yang Tersedia</h1>
        <div>
            @foreach ($products as $product)
            <div class="p-6 flex flex-col sm:flex-row gap-6">
                <div class="shrink-0">
                    @if ($product->product_image)
                        <img src="data:image/png;base64,{{ $product->product_image }}"
                            alt="Product"
                            class="w-96 h-96 object-cover rounded-md">
                    @else
                        <img src="{{ asset('images/empty-pic.png') }}"
                            alt="Product"
                            class="w-96 h-96 object-cover rounded-md">
                    @endif
                </div>

                <div class="flex flex-col justify-between flex-grow">
                    <div>
                        <h2 class="text-xl font-semibold">{{ $product->product_name }}</h2>
                        <p class="text-gray-600">Tipe : {{ $product->type }}</p>
                        @if($product->type == 'Non-Custom')
                        <p class="text-gray-600">
                            Ukuran :
                            {{ rtrim(rtrim(number_format($product->length, 2, '.', ''), '0'), '.') }}m x
                            {{ rtrim(rtrim(number_format($product->width, 2, '.', ''), '0'), '.') }}m
                        </p>
                        @endif
                        <p class="text-gray-600 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('product.detail', $product->product_id) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg transition duration-300">
                            Order
                        </a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.3 }
        );

        document.querySelectorAll(".fade-in").forEach((el) => observer.observe(el));
    });

    document.addEventListener("DOMContentLoaded", function () {
        const shopButton = document.getElementById("shopButton");
        if (shopButton) {
            shopButton.addEventListener("click", function (event) {
                event.preventDefault();
                document.getElementById("shop").scrollIntoView({
                    behavior: "smooth"
                });
            });
        }
    });

</script>
@endsection
