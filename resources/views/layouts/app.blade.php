<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <title>@yield('title', 'PT. Chaste Gemilang Mandiri')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/custom.css'])
    <style>
        body {
            font-family: 'Lato', sans-serif;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-[#42A3A7] p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center ml-4">
                <!-- Logo Text -->
                <img src="{{ asset('images/carpet.png') }}" alt="Carpet" class="w-12 h-12 mr-2">
                @auth
                @if(Auth::user()->profile->role->role_name == 'Buyer')
                <a href="{{ route('catalog.index') }}" class="text-white text-xl hover:underline">PT. Chaste Gemilang Mandiri</a>
                @else
                <a href="{{ route('dashboard.index') }}" class="text-white text-xl hover:underline">PT. Chaste Gemilang Mandiri</a>
                @endif
                @else
                <a href="/" class="text-white text-xl hover:underline">PT. Chaste Gemilang Mandiri</a>
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex space-x-4 mr-4">
                @auth
                    @if(Auth::user()->profile->role->menus->contains('menu_name', 'REPORT'))
                    <div x-data="{ isOpen: false }" class="relative">
                        <button @click="isOpen = !isOpen" class="text-white hover:text-gray-200 focus:outline-none">
                            Laporan
                            <svg class="w-4 h-4 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Menu -->
                        <div x-show="isOpen" @click.away="isOpen = false" class="absolute mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="{{ route('bargain.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Tawar Menawar</a>
                        </div>
                    </div>
                    @endif

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
                            <a href="{{ route('user.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">User</a>
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
                            <a href="{{ route('product.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Produk</a>
                            <a href="{{ route('productcategory.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Kategori Produk</a>
                            <a href="{{ route('stock.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Stok</a>
                            <a href="{{ route('productcolor.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Warna Produk</a>
                        </div>
                    </div>
                    @endif

                    <div class="relative">
                        @auth
                        @if(Auth::user()->profile->role->role_name != 'Owner')
                        <a href="{{ route('cart.index') }}"><img src="{{ asset('images/grocery-store-white.png') }}" alt="Cart" class="w-4 h-4 inline ml-1"></a>
                        @endif
                        @endauth
                    </div>

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
                    <a href="{{ route('register') }}" class="text-white hover:text-gray-200 hover:underline">Daftar</a>
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-200 hover:underline">Login</a>
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
                        <a href="{{ route('user.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">User</a>
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
                        <a href="{{ route('product.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Produk</a>
                        <a href="{{ route('productcategory.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Kategori Produk</a>
                        <a href="{{ route('stock.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Stok</a>
                        <a href="{{ route('productcolor.index') }}" class="block text-white py-2 hover:bg-[#6DA8B8] px-4">Warna Produk</a>
                    </div>
                </div>
                @endif

                <div class="relative">
                    <a href=""><img src="{{ asset('images/grocery-store-white.png') }}" alt="Cart" class="w-4 h-4"></a>
                </div>

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
                <a href="{{ route('register') }}" class="block text-white py-2 hover:bg-[#6DA8B8] hover:underline">Daftar</a>
                <a href="{{ route('login') }}" class="block text-white py-2 hover:bg-[#6DA8B8] hover:underline">Login</a>
            @endauth
        </div>
    </nav>

    <main>
        @yield('content') <!-- This will be replaced by child views -->
    </main>

    <!-- Footer -->
    <footer class="bg-[#F2D1C9] text-white p-6">
        <div class="container mx-auto">
            <div class="flex items-center justify-center">
                <img src="{{ asset('images/company-logo.png') }}" alt="Carpet" class="w-24 h-24 mr-2">
            </div>
            <div class="mb-4">
                <h3 class="text-lg text-center">Hubungi kami</h3>
                <h3 class="text-lg text-center mb-2">PT. Chaste Gemilang Mandiri</h3>
                <ul>
                    <!-- Email -->
                    <li class="text-sm flex items-center justify-center">
                        <img src="{{ asset('images/email.png') }}" alt="Email" class="w-4 h-4 mr-2"> <!-- Gambar email -->
                        {{ $email->general_parameter_value }}
                    </li>
                    <!-- Telepon -->
                    <li class="text-sm flex items-center justify-center mt-2">
                        <img src="{{ asset('images/phone-call.png') }}" alt="Telepon" class="w-4 h-4 mr-2"> <!-- Gambar telepon -->
                        {{ $phone->general_parameter_value }}
                    </li>
                    <!-- Alamat -->
                    <li class="text-sm flex items-center justify-center mt-2">
                        <img src="{{ asset('images/building.png') }}" alt="Alamat" class="w-4 h-4 mr-2"> <!-- Gambar alamat -->
                        {{ $address->general_parameter_value }}
                    </li>
                </ul>
            </div>
            <p class="text-center">&copy; PT. Chaste Gemilang Mandiri 2025. Hak Cipta Dilindungi</p>
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
