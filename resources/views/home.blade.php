@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8">Produk Kami</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="border border-gray-300 rounded-lg shadow-md overflow-hidden flex flex-col transition-transform transform hover:scale-105 duration-300">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4">
                @else
                    <img src="{{ asset('images/default.png') }}" alt="Default Image" class="w-full h-48 object-cover mb-4">
                @endif
                <div class="p-4 flex flex-col flex-grow">
                    <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $product->name }}</h2>
                    <p class="text-gray-600 mb-2 flex-grow">{{ Str::limit($product->description, 100) }}</p>
                    <p class="text-lg font-bold text-pink-600 mb-2">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>
                <div class="p-4 border-t border-gray-200">
                    @if($product->stock > 0)
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition duration-300">Tambah ke Keranjang</button>
                        </form>
                    @else
                        <span class="text-red-500 font-semibold">Sold Out</span>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
