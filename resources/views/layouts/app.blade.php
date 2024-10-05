<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake Shop - UMKM Rambut Nenek Bpn</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>

<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    <header class="bg-white shadow-md text-black ">
        <div class="container mx-auto flex justify-between items-center py-4 px-6 flex-wrap">
            <div class="flex items-center">
                <span class="ml-3 text-2xl font-bold">Rambut Nenek BPN</span>
            </div>
            <nav class="flex space-x-6 flex-wrap">
                <a class="text-lg font-semibold flex items-center hover:text-pink-200 transition duration-300" href="{{ route('home') }}">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="{{ route('home') }}">
                    <i class="fas fa-cookie-bite mr-2"></i> Produk
                </a>
                @auth
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart mr-2"></i> Keranjang Belanja
                </a>
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="{{ route('transactions.index') }}">
                    <i class="fas fa-file-invoice-dollar mr-2"></i> Transaksi
                </a>
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="{{ route('about') }}">
                    <i class="fas fa-info-circle mr-2"></i> About Us
                </a>
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="{{ route('profile') }}">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                @else
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="{{ route('customer.login') }}">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>
                @endauth
            </nav>
            <div class="flex space-x-4">
                @auth
                <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-lg flex items-center hover:text-pink-200 transition duration-300">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
                @else
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="#">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-lg flex items-center hover:text-pink-200 transition duration-300" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-pink-600 shadow-md mt-8">
        <div class="container mx-auto px-6 py-4 text-center">
            <p class="text-white">&copy; {{ date('Y') }} Cake Shop. All rights reserved.</p>
        </div>
    </footer>

    @livewireScripts
</body>
<script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/js/aos.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ asset('frontend/js/scrollax.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{ asset('frontend/js/google-map.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>
</html>
