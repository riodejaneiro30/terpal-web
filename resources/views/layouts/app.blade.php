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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-[#80C0CE] p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <!-- Logo Text -->
                <img src="{{ asset('images/carpet.png') }}" alt="Carpet" class="w-8 h-8 mr-2">
                <a href="/" class="text-white text-xl">Terpal</a>
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-4">
                @auth
                    <!-- Parameter Dropdown -->
                    @if(Auth::user()->profile->role->menus->contains('menu_name', 'PARAMETER_MANAGEMENT'))
                    <div x-data="{ isOpen: false }" class="relative">
                        <button @click="isOpen = !isOpen" class="text-white hover:text-gray-200 focus:outline-none">
                            Parameter
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div x-show="isOpen" @click.away="isOpen = false" class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="{{ route('generalparameter.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">General Parameter</a>
                        </div>
                    </div>
                    @endif

                    <!-- User Management Dropdown -->
                    @if(Auth::user()->profile->role->menus->contains('menu_name', 'USER_MANAGEMENT'))
                    <div x-data="{ isOpen: false }" class="relative">
                        <button @click="isOpen = !isOpen" class="text-white hover:text-gray-200 focus:outline-none">
                            Pengguna
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div x-show="isOpen" @click.away="isOpen = false" class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="{{ route('menu.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Menu</a>
                            <a href="{{ route('role.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Role</a>
                            <a href="{{ route('menurole.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Menu Role</a>
                            <a href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">User</a>
                        </div>
                    </div>
                    @endif

                    <!-- Product Management Dropdown -->
                    @if(Auth::user()->profile->role->menus->contains('menu_name', 'PRODUCT_MANAGEMENT'))
                    <div x-data="{ isOpen: false }" class="relative">
                        <button @click="isOpen = !isOpen" class="text-white hover:text-gray-200 focus:outline-none">
                            Produk
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div x-show="isOpen" @click.away="isOpen = false" class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Produk</a>
                            <a href="{{ route('productcategory.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Kategori Produk</a>
                        </div>
                    </div>
                    @endif

                    <!-- User Dropdown -->
                    <div x-data="{ isUserDropdownOpen: false }" class="relative">
                        <button @click="isUserDropdownOpen = !isUserDropdownOpen" class="text-white hover:text-gray-200 focus:outline-none">
                            <img src="{{ asset('images/user.png') }}" alt="User" class="w-4 h-4 inline ml-1">
                            {{ Auth::user()->name }}
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div x-show="isUserDropdownOpen" @click.away="isUserDropdownOpen = false" class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="{{ route('userprofile.edit', ['user' => Auth::id()]) }}" class="block w-full px-4 py-2 text-gray-800 hover:bg-gray-100 text-left">Profil User</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-gray-800 hover:bg-gray-100 text-left">Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <!-- Show Register and Login if not authenticated -->
                    <a href="{{ route('register') }}" class="text-white hover:text-gray-200">Daftar</a>
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-200">Login</a>
                @endauth
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="lg:hidden mt-2 hidden">
            @auth
                <!-- Parameter Management Dropdown for Mobile -->
                @if(Auth::user()->profile->role->menus->contains('menu_name', 'USER_MANAGEMENT'))
                <div x-data="{ isMobileDropdownOpen: false }" class="relative">
                    <button @click="isMobileDropdownOpen = !isMobileDropdownOpen" class="block w-full text-white py-2 hover:bg-[#6DA8B8] text-left">
                        Parameter
                        <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu for Mobile -->
                    <div x-show="isMobileDropdownOpen">
                        <a href="{{ route('generalparameter.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">General Parameter</a>
                    </div>
                </div>
                @endif

                <!-- User Management Dropdown for Mobile -->
                @if(Auth::user()->profile->role->menus->contains('menu_name', 'USER_MANAGEMENT'))
                <div x-data="{ isMobileDropdownOpen: false }" class="relative">
                    <button @click="isMobileDropdownOpen = !isMobileDropdownOpen" class="block w-full text-white py-2 hover:bg-[#6DA8B8] text-left">
                        Pengguna
                        <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu for Mobile -->
                    <div x-show="isMobileDropdownOpen">
                        <a href="{{ route('menu.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Menu</a>
                        <a href="{{ route('role.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Role</a>
                        <a href="{{ route('menurole.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Menu Role</a>
                        <a href="" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">User</a>
                    </div>
                </div>
                @endif

                <!-- Product Management Dropdown for Mobile -->
                @if(Auth::user()->profile->role->menus->contains('menu_name', 'PRODUCT_MANAGEMENT'))
                <div x-data="{ isMobileDropdownOpen: false }" class="relative">
                    <button @click="isMobileDropdownOpen = !isMobileDropdownOpen" class="block w-full text-white py-2 hover:bg-[#6DA8B8] text-left">
                        Produk
                        <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu for Mobile -->
                    <div x-show="isMobileDropdownOpen">
                        <a href="" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Produk</a>
                        <a href="{{ route('productcategory.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Kategori Produk</a>
                    </div>
                </div>
                @endif

                <!-- User Dropdown for Mobile -->
                <div x-data="{ isMobileUserDropdownOpen: false }" class="relative">
                    <button @click="isMobileUserDropdownOpen = !isMobileUserDropdownOpen" class="block w-full text-white py-2 hover:bg-[#6DA8B8] text-left">
                        <img src="{{ asset('images/user.png') }}" alt="User" class="w-4 h-4 inline ml-1">
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown Menu for Mobile -->
                    <div x-show="isMobileUserDropdownOpen">
                        <a href="{{ route('userprofile.edit', ['user' => Auth::id()]) }}" class="block w-full text-white py-2 hover:bg-[#6DA8B8] px-4 text-left">Profil User</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-white py-2 hover:bg-[#6DA8B8] px-4 text-left">Logout</button>
                        </form>
                    </div>
                </div>
            @else
                <!-- Show Register and Login if not authenticated -->
                <a href="{{ route('register') }}" class="block text-white py-2 hover:bg-[#6DA8B8]">Daftar</a>
                <a href="{{ route('login') }}" class="block text-white py-2 hover:bg-[#6DA8B8]">Login</a>
            @endauth
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

        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                isOpen: false,
                isMobileDropdownOpen: false,
            }));
        });
    </script>
</body>
</html>