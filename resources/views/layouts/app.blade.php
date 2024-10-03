<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Shop - UMKM Rambut Nenek Bpn</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-pink-600 shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-white">Cake Shop</a>
            <div class="flex items-center space-x-6">
                @guest
                    <a href="{{ route('customer.login') }}" class="text-white hover:text-pink-200 transition duration-300">Login</a>
                    <a href="{{ route('home') }}" class="text-white hover:text-pink-200 transition duration-300">Produk</a>
                @else
                    <a href="{{ route('home') }}" class="text-white hover:text-pink-200 transition duration-300">Produk</a>
                    <a href="{{ route('cart.index') }}" class="text-white hover:text-pink-200 transition duration-300">Keranjang Belanja</a>
                    <a href="{{ route('transactions.index') }}" class="text-white hover:text-pink-200 transition duration-300">Transaksi</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-pink-200 transition duration-300">About Us</a>
                    <a href="{{ route('profile') }}" class="text-white hover:text-pink-200 transition duration-300">Profile</a>
                    <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-white hover:text-pink-200 transition duration-300">Logout</button>
                    </form>
                @endguest
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-pink-600 shadow-md mt-8">
        <div class="container mx-auto px-6 py-4 text-center">
            <p class="text-white">&copy; {{ date('Y') }} Cake Shop. All rights reserved.</p>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
