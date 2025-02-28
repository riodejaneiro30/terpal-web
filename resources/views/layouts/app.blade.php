<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'Terpal')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <div class="flex items-center">
                <!-- Logo Text -->
                <a href="#" class="text-white text-xl">Terpal</a>
            </div>

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

    <main>
        @yield('content') <!-- This will be replaced by child views -->
    </main>

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
