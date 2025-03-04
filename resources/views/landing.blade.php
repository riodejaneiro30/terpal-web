<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <title>Terpal</title>
        <style>
            body {
                font-family: 'Lato', sans-serif;
            }
        </style>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="bg-[#80C0CE] p-4">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Logo -->
                <a href="#" class="text-white text-6x4">Terpal</a>

                <!-- Mobile Menu Button -->
                <button class="lg:hidden text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex space-x-4">
                    <a href="#" class="text-white hover:text-gray-200">Daftar</a>
                    <a href="#" class="text-white hover:text-gray-200">Login</a>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div class="lg:hidden mt-2 hidden">
                <a href="#" class="block text-white py-2 hover:bg-[#6DA8B8]">Daftar</a>
                <a href="#" class="block text-white py-2 hover:bg-[#6DA8B8]">Login</a>
            </div>
        </nav>

        <div class="min-h-screen flex items-center justify-center bg-gray-100">
            <div class="flex w-full">
                <!-- Left Column -->
                <div class="flex-1 bg-blue-200 p-4">
                <h2 class="text-xl font-bold">Left Column</h2>
                <p>This is the left column content.</p>
                </div>

                <!-- Right Column -->
                <div class="flex-1 bg-green-200 p-4">
                <h2 class="text-xl font-bold">Right Column</h2>
                <p>This is the right column content.</p>
                </div>
            </div>
            </div>

        <!-- Content -->
        <div class="container mx-auto p-4">
            <p class="mt-4">PT. Chaste Gemilang Mandiri merupakan perusahaan yang bergerak di bidang penjualan terpal yang dibutuhkan oleh masyarakat umum ataupun perusahaan-perusahaan bidang lain. Sesuai ijin dagangnya
            perusahaan ini berlokasi pada kota Surabaya tepatnya pada jalan Mulyosari Prima Utara VI No. 8, 60112. Telah berdiri selama kurang lebih 24 tahun yang mana telah berganti nama sekali.</p>
        </div>

        <!-- Footer -->
        <footer class="bg-[#80C0CE] text-white p-6 mt-8">
            <div class="container mx-auto text-center">
                <p>&copy; Terpal 2025. Hak Cipta Dilindungi</p>
            </div>
        </footer>

        <!-- JavaScript to toggle mobile menu -->
        <script>
            const mobileMenuButton = document.querySelector('button');
            const mobileMenu = document.querySelector('.lg\\:hidden.hidden');

            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        </script>
    </body>
</html>
