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
    </style>
</head>

<body>
    <!-- Circle Backgrounds -->
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>

    <!-- Navbar -->
    <header class="shadow-md text-black relative">
        <div class="container mx-auto flex justify-between items-center py-4 px-6 flex-wrap">
            <div class="flex items-center">
                <span class="navbar-brand">Rambut Nenek BPN</span>
            </div>
            <div class="navbar-toggler" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
            <nav class="flex items-center space-x-6 flex-wrap navbar-menu">
                <a class="text-lg font-semibold flex items-center {{ request()->is('home') ? 'active-link' : '' }}" href="{{ route('home') }}">
                    <i class="fas fa-home mr-2"></i> Home
                </a>
                <a class="text-lg flex items-center {{ request()->is('home') ? 'active-link' : '' }}" href="{{ route('home') }}#products">
                    <i class="fas fa-cookie-bite mr-2"></i> Produk
                </a>

                @auth
                <a class="text-lg flex items-center {{ request()->is('cart') ? 'active-link' : '' }}" href="{{ route('cart.index') }}">
                    <i class="fas fa-shopping-cart mr-2"></i> Keranjang Belanja
                </a>
                <a class="text-lg flex items-center {{ request()->is('transactions') ? 'active-link' : '' }}" href="{{ route('transactions.index') }}">
                    <i class="fas fa-file-invoice-dollar mr-2"></i> Transaksi
                </a>
                <a class="text-lg flex items-center {{ request()->is('about') ? 'active-link' : '' }}" href="{{ route('about') }}">
                    <i class="fas fa-info-circle mr-2"></i> About Us
                </a>
                <a class="text-lg flex items-center {{ request()->is('profile') ? 'active-link' : '' }}" href="{{ route('profile') }}">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                @else
                <a class="text-lg flex items-center {{ request()->is('customer/login') ? 'active-link' : '' }}" href="{{ route('customer.login') }}">
                    <i class="fas fa-sign-in-alt mr-2"></i> Login
                </a>
                @endauth
            </nav>
            <div class="flex space-x-4 navbar-icons">
                @auth
                <form action="{{ route('customer.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-lg flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </button>
                </form>
                @else
                <a href="#" class="text-lg flex items-center">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-lg flex items-center">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-lg flex items-center">
                    <i class="fab fa-twitter"></i>
                </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 flex-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#8b0330] text-white py-8">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-between mb-6">
                <div class="w-full md:w-1/4 mb-6">
                    <h2 class="text-2xl font-bold mb-2">Rambut<span class="text-[#A5855F]"> Nenek BPN</span></h2>
                    <p class="text-sm">Rambut Nenek Balikpapan: Cemilan Legendaris untuk Semua Momen..</p>
                    <ul class="flex space-x-4 mt-2">
                        <li><a href="#" class="hover:text-[#A5855F]"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" class="hover:text-[#A5855F]"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" class="hover:text-[#A5855F]"><i class="fab fa-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 mb-6">
                    <h3 class="text-lg font-semibold mb-2">Link Terkait</h3>
                    <ul>
                        <li><a href="{{ route('home') }}" class="hover:text-[#A5855F]">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#A5855F]">About Us</a></li>
                        <li><a href="{{ route('home') }}#products" class="hover:text-[#A5855F]">Produk</a></li>
                        <li><a href="{{ route('cart.index') }}" class="hover:text-[#A5855F]">Keranjang Belanja</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 mb-6">
                    <h3 class="text-lg font-semibold mb-2">Kontak Kami</h3>
                    <p>Email: <a href="mailto:info@rambutnenekbpn.com" class="hover:text-[#A5855F]">info@rambutnenekbpn.com</a></p>
                    <p>Tel: <a href="tel:+621234567890" class="hover:text-[#A5855F]">+62 123 456 7890</a></p>
                </div>
            </div>
            <p class="text-center text-sm">© 2024 Rambut Nenek BPN. Semua hak dilindungi.</p>
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
