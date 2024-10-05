@extends('layouts.app')

@section('content')
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100">
    <div class="max-w-6xl mx-auto p-4 flex">
        <!-- Left Image Section -->
        <div class="w-1/2">
            <img alt="{{ $product->name }}" height="800" src="{{ asset('storage/' . $product->image) }}" width="600"/>
        </div>
        <!-- Right Details Section -->
        <div class="w-1/2 bg-white p-6">
            <div class="flex items-center mb-2">
                <i class="fas fa-fire text-orange-500 mr-2"></i>
                <span class="text-gray-600">{{ $product->orders_count }} orders in last 24 hours</span>
                <i class="fas fa-user text-orange-500 ml-4 mr-2"></i>
                <span class="text-gray-600">{{ $product->views_count }} active views</span>
            </div>
            <h1 class="text-2xl font-bold mb-2">{{ $product->name }}</h1>
            <span class="bg-gray-200 text-gray-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">#1 Best Seller</span>
            <div class="mt-4">
                <span class="text-3xl font-bold text-gray-900">Rp {{ number_format($product->price, 2, ',', '.') }}</span>
                <span class="text-gray-500 line-through ml-2">Rp {{ number_format($product->original_price, 2, ',', '.') }}</span>
                <span class="text-orange-500 ml-2">{{ $product->discount }}% off</span>
            </div>
            <div class="mt-4">
                <span class="text-gray-700">Deskripsi:</span>
                <p class="text-gray-700 mt-2">{{ $product->description }}</p>
            </div>
            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                @csrf
                <div class="mt-4">
                    <span class="text-gray-700">Quantity</span>
                    <div class="flex items-center mt-2">
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="border-t border-b border-gray-300 text-gray-700 px-4 py-2 w-16 text-center" />
                    </div>
                </div>
                <div class="mt-4 flex">
                    <button type="submit" class="bg-orange-500 text-white px-6 py-2">Add To Cart</button>
                </div>
            </form>
            <div class="mt-4">
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
    </script>
</body>
</html>
@endsection
