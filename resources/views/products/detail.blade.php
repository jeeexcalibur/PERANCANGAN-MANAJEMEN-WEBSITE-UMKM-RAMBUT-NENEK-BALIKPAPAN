@extends('layouts.app')

@section('content')
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Include SweetAlert -->
    <style>
        /* Add shadow and rounded corners */
        .product-card {
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Button hover effects */
        .btn-primary {
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #FF8C00; /* Darker orange */
        }

        /* Image hover effect */
        .image-hover {
            overflow: hidden;
            border-radius: 0.5rem; /* Round corners */
        }

        .image-hover img {
            transition: transform 0.5s ease;
        }

        .image-hover:hover img {
            transform: scale(1.1);
        }

        /* Animation for entering elements */
        .fade-in {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeIn 0.5s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto p-4 flex flex-col md:flex-row">
        <!-- Left Image Section -->
        <div class="w-full md:w-1/2 image-hover fade-in">
            <img alt="{{ $product->name }}" height="800" src="{{ asset('storage/' . $product->image) }}" width="600" class="rounded-lg shadow-lg"/>
        </div>
        <!-- Right Details Section -->
        <div class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-md fade-in">
            <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
            <span class="bg-yellow-400 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Best Seller</span>
            <div class="mt-4">
                <span class="text-4xl font-bold text-gray-900">Rp {{ number_format($product->price, 2, ',', '.') }}</span>
            </div>
            <div class="mt-4">
                <span class="text-gray-700">Deskripsi:</span>
                <p class="text-gray-700 mt-2">{{ $product->description }}</p>
            </div>
            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-6" id="addToCartForm">
                @csrf
                <div>
                    <span class="text-gray-700">Quantity</span>
                    <div class="flex items-center mt-2">
                        <button type="button" id="decrease-quantity" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            -
                        </button>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="border-t border-b border-gray-300 text-gray-700 text-center w-16" />
                        <button type="button" id="increase-quantity" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                            +
                        </button>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn-primary bg-orange-500 text-white px-6 py-2 rounded">Add To Cart</button>
                </div>
            </form>
            <div class="mt-4 flex items-center">
                <i class="fas fa-truck text-orange-500 mr-2"></i>
                <span class="text-gray-700">Free shipping for orders above Rp 500.000</span>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('increase-quantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            var quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
        });

        document.getElementById('decrease-quantity').addEventListener('click', function() {
            var quantityInput = document.getElementById('quantity');
            var quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        });

        document.getElementById('addToCartForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting

            @auth
                this.submit(); // If the user is authenticated, submit the form
            @else
                Swal.fire({
                    title: 'Harap Login Terlebih Dahulu',
                    text: 'Silakan masuk untuk menambahkan produk ke keranjang.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            @endauth
        });
    </script>
</body>
</html>
@endsection
