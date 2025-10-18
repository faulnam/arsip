<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Rumah BUMN') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        <!-- Logo & Brand -->
        <div class="mb-8 text-center">
            <div class="flex items-center justify-center mb-4">
                <div class="bg-gray-800 p-4 rounded-xl shadow-lg">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Rumah BUMN Sidoarjo</h1>
            <p class="text-gray-600">Sistem Arsip Digital & Event Pelatihan</p>
        </div>

        <!-- Login Card -->
        <div class="w-full sm:max-w-md">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gray-800 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white text-center">Login Admin</h2>
                    <p class="text-gray-300 text-center text-sm mt-1">Masuk ke dashboard admin</p>
                </div>

                <!-- Card Body -->
                <div class="px-8 py-8">
                    <!-- Session Status -->
                    @if (session('status'))
                        <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <p class="text-green-700 text-sm font-medium">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}" class="space-y-6">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-colors" 
                                   placeholder="admin@example.com"
                                   required 
                                   autofocus 
                                   autocomplete="username">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <input id="password" 
                                   type="password" 
                                   name="password"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-gray-500 transition-colors" 
                                   placeholder="••••••••"
                                   required 
                                   autocomplete="current-password">
                            @error('password')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center justify-between">
                            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                                <input id="remember_me" 
                                       type="checkbox" 
                                       class="w-4 h-4 rounded border-gray-300 text-gray-800 shadow-sm focus:ring-gray-500 cursor-pointer" 
                                       name="remember">
                                <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                            </label>

                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 hover:text-gray-800 font-medium transition-colors" 
                                   href="{{ route('password.request') }}">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" 
                                class="w-full bg-gray-800 hover:bg-gray-900 text-white font-medium py-3 px-4 rounded-lg shadow-sm hover:shadow-md transition-all duration-200">
                            Masuk ke Dashboard
                        </button>
                    </form>
                </div>

                <!-- Card Footer -->
                <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
                    <p class="text-center text-sm text-gray-600">
                        <a href="{{ url('/') }}" class="inline-flex items-center text-gray-600 hover:text-gray-800 font-medium transition-colors">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Halaman Utama
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <p>&copy; {{ date('Y') }} Rumah BUMN Sidoarjo</p>
            <p class="text-xs text-gray-500 mt-1">Developed by <span class="font-medium">nafisbgt</span></p>
        </div>
    </div>
</body>
</html>
