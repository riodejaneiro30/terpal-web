@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="flex flex-col sm:flex-row w-full">
        <div class="flex-1 flex items-center justify-center py-8 px-4 sm:pr-24">
            <img src="{{ asset('images/undraw-factory.png') }}" alt="Factory" class="w-full max-w-md">
        </div>

        <div class="flex-1 py-8 px-4 sm:pr-24">
            <div class="flex-col items-center justify-center h-full">
                <div class="mb-8 flex justify-center items-center">
                    <img src="{{ asset('images/company-logo.png') }}" alt="Company Logo" class="w-24 h-24">
                </div>

                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Login') }}</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Alamat Email') }}</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mb-4 text-center">
                        <p class="text-sm text-gray-600">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500">
                                {{ __('Daftar') }}
                            </a>
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection