<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UMKM Rambut Nenek Bpn</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            position: relative; /* Added for positioning the circles */
        }



        body {
            display: flex;
            flex-direction: column;
            z-index: 1; /* Ensure body content is above circles */
        }

        main {
            flex: 1;
        }

        /* Navbar */
        header {
            background-color: #8b0330; /* Soft pink */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff;
        }

        nav a {
            color: #ffffff;
            transition: all 0.3s;
        }

        nav a:hover {
            color: #A5855F; /* Darker pink on hover */
            transform: scale(1.1);
        }

        /* Active link color */
        .active-link {
            color: #A5855F; /* Active link color */
            border-bottom: 2px solid #A5855F; /* Menambahkan border bawah */
            padding-bottom: 4px; /* Menambahkan jarak antara teks dan garis bawah */
            font-weight: bold; /* Membuat teks lebih tebal jika diinginkan */
        }

        /* Footer */
        footer {
            background-color: #8b0330;
            color: #f1f1f1;
            margin-top: 2rem;
        }

        footer h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        footer a {
            color: #f1f1f1;
            transition: all 0.3s;
        }

        footer a:hover {
            color: #A5855F; /* Darker pink on hover */
        }

        /* Hamburger Menu */
        .navbar-toggler {
            display: none;
        }

        @media (max-width: 768px) {
            .navbar-icons {
                display: none;
            }

            .navbar-toggler {
                display: block;
                cursor: pointer;
                color: #3b3b3b;
                font-size: 1.5rem;
            }

            .navbar-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 0;
                background-color: #f1c0e3; /* Soft pink */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                z-index: 10;
            }

            .navbar-menu.active {
                display: flex;
            }

            nav a {
                padding: 10px 20px;
                border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            }

            nav a:last-child {
                border-bottom: none;
            }
        }

        form button {
            color: #ffffff;
            background-color: transparent;
            border: none;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        form button:hover {
            color: #A5855F; /* Darker pink on hover */
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <!-- Circle Backgrounds -->
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>

    <!-- Navbar -->
    <header class="shadow-md text-black relative">
        <nav class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <a href="#">
                    @php
                        $landingPage = \App\Models\LandingPages::where('image_title', 'Header')->first();
                    @endphp
                    @if($landingPage && $landingPage->image_url)
                        <img src="{{ $landingPage->image_url }}" alt="Rambut Nenek BPN Logo" class="h-12">
                    @else
                        <!-- Optional fallback logo or text if image is not found -->
                        <span class="text-2xl font-bold text-gray-800">Rambut Nenek BPN</span>
                    @endif
                </a>
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800 transition duration-300 {{ request()->is('home') ? 'text-gray-800 font-semibold' : '' }}">
                        <i class="fas fa-home mr-2"></i> Home
                    </a>
                    <a href="{{ route('home') }}#products" class="text-gray-600 hover:text-gray-800 transition duration-300 {{ request()->is('home') ? 'text-gray-800 font-semibold' : '' }}">
                        <i class="fas fa-cookie-bite mr-2"></i> Produk
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-600 hover:text-gray-800 transition duration-300 {{ request()->is('about') ? 'text-gray-800 font-semibold' : '' }}">
                        <i class="fas fa-info-circle mr-2"></i> About Us
                    </a>
        
                    @auth
                        <a href="{{ route('cart.index') }}" class="text-gray-600 hover:text-gray-800 transition duration-300 {{ request()->is('cart') ? 'text-gray-800 font-semibold' : '' }}">
                            <i class="fas fa-shopping-cart mr-2"></i> Keranjang Belanja
                        </a>
                        <a href="{{ route('transactions.index') }}" class="text-gray-600 hover:text-gray-800 transition duration-300 {{ request()->is('transactions') ? 'text-gray-800 font-semibold' : '' }}">
                            <i class="fas fa-file-invoice-dollar mr-2"></i> Transaksi
                        </a>
                        <a href="{{ route('profile') }}" class="text-gray-600 hover:text-gray-800 transition duration-300 {{ request()->is('profile') ? 'text-gray-800 font-semibold' : '' }}">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                    @else
                        <a href="{{ route('customer.login') }}" class="text-gray-600 hover:text-gray-800 transition duration-300 {{ request()->is('customer/login') ? 'text-gray-800 font-semibold' : '' }}">
                            <i class="fas fa-sign-in-alt mr-2"></i> Login
                        </a>
                    @endauth
                </div>
        
                <div class="hidden md:flex space-x-4">
                    @auth
                        <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-800 transition duration-300">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    @else
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition duration-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition duration-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition duration-300"><i class="fab fa-twitter"></i></a>
                    @endauth
                </div>
        
                <div class="md:hidden">
                    <button id="menu-btn" class="text-gray-600 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        
            <div id="mobile-menu" class="hidden md:hidden">
                <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a href="{{ route('home') }}#products" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                    <i class="fas fa-cookie-bite mr-2"></i> Produk
                </a>
        
                @auth
                    <a href="{{ route('cart.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                        <i class="fas fa-shopping-cart mr-2"></i> Keranjang Belanja
                    </a>
                    <a href="{{ route('transactions.index') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                        <i class="fas fa-file-invoice-dollar mr-2"></i> Transaksi
                    </a>
                    <a href="{{ route('about') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                        <i class="fas fa-info-circle mr-2"></i> About Us
                    </a>
                    <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                        <i class="fas fa-user mr-2"></i> Profile
                    </a>
                @else
                    <a href="{{ route('customer.login') }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                        <i class="fas fa-sign-in-alt mr-2"></i> Login
                    </a>
                @endauth
        
                <div class="flex justify-center space-x-4 py-2">
                    @auth
                        <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-800 transition duration-300">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    @else
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition duration-300"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition duration-300"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-600 hover:text-gray-800 transition duration-300"><i class="fab fa-twitter"></i></a>
                    @endauth
                </div>
            </div>
        </nav>
        
        <script>
            document.getElementById('menu-btn').addEventListener('click', function() {
                var menu = document.getElementById('mobile-menu');
                if (menu.classList.contains('hidden')) {
                    menu.classList.remove('hidden');
                } else {
                    menu.classList.add('hidden');
                }
            });
        </script>
        
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-1">
        @yield('content')
    </main>

<!-- Footer -->
<footer class="bg-[#8b0330] text-white py-12">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between mb-8">
            <div class="w-full md:w-1/4 mb-6">
                <h2 class="text-3xl font-bold mb-3">
                    Rambut<span class="text-[#A5855F]"> Nenek BPN</span>
                </h2>
                <p class="text-sm mb-4">Rambut Nenek Balikpapan: Cemilan Legendaris untuk Semua Momen.</p>
                <ul class="flex space-x-6">
                    <li>
                        <a href="#" class="text-[#A5855F] hover:text-white transition duration-300">
                            <i class="fab fa-facebook-f text-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-[#A5855F] hover:text-white transition duration-300">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="text-[#A5855F] hover:text-white transition duration-300">
                            <i class="fab fa-twitter text-2xl"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 mb-6">
                <h3 class="text-lg font-semibold mb-3">Link Terkait</h3>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-[#A5855F] transition duration-300">Home</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-[#A5855F] transition duration-300">About Us</a></li>
                    <li><a href="{{ route('home') }}#products" class="hover:text-[#A5855F] transition duration-300">Produk</a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:text-[#A5855F] transition duration-300">Keranjang Belanja</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/4 mb-6">
                <h3 class="text-lg font-semibold mb-3">Kontak Kami</h3>
                <p>Email: <a href="mailto:info@rambutnenekbpn.com" class="hover:text-[#A5855F] transition duration-300">info@rambutnenekbpn.com</a></p>
                <p>Tel: <a href="tel:+621234567890" class="hover:text-[#A5855F] transition duration-300">+62 123 456 7890</a></p>
            </div>
        </div>

        <!-- Newsletter Subscription -->
        <div class="text-center mb-6">
            <h3 class="text-lg font-semibold mb-3">Berlangganan Newsletter</h3>
            <p class="text-sm mb-4">Dapatkan informasi terbaru tentang produk dan promo kami langsung di inbox Anda.</p>
            <form class="flex justify-center space-x-4">
                <input type="email" placeholder="Masukkan email Anda" class="px-4 py-2 rounded-l-md text-gray-700 w-64" required>
                <button type="submit" class="bg-[#A5855F] text-white px-6 py-2 rounded-r-md hover:bg-[#8b0330] transition duration-300">Subscribe</button>
            </form>
        </div>

        <!-- Footer Bottom -->
        <p class="text-center text-sm mt-8">© 2024 Rambut Nenek BPN. Semua hak dilindungi.</p>
    </div>
</footer>


    @livewireScripts
    <script>
        function toggleMenu() {
            const menu = document.querySelector('.navbar-menu');
            menu.classList.toggle('active');
        }
    </script>
</body>

</html>
