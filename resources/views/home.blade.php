@extends('layouts.app')

@section('content')
<!-- Slideshow Section -->

<!-- Top Section -->
<div class="flex flex-wrap justify-center space-x-4 py-8">
    <!-- New Hoodie -->
    <div class="relative bg-white p-4 rounded-lg shadow-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
        <img alt="Person wearing a new hoodie" class="w-full h-full object-cover rounded-lg" height="400" src="{{ asset('assets/images/pic12.jpg') }}" width="300"/>
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold">New Hoodie</h2>
            <p class="text-xs sm:text-sm md:text-base">BUY ONE GET ONE FREE</p>
        </div>
        <div class="absolute top-4 right-4 bg-white rounded-full p-2">
            <i class="far fa-heart text-gray-500"></i>
        </div>
        <div class="absolute top-4 left-4 bg-white text-black px-2 py-1 rounded-full text-xs">26% OFF</div>
    </div>

    <!-- Women Fashion -->
    <div class="relative bg-white p-4 rounded-lg shadow-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
        <img alt="Woman in fashion outfit" class="w-full h-full object-cover rounded-lg" height="400" src="{{ asset('assets/images/pic6.jpg') }}" width="300"/>
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold">Women Fashion</h2>
            <p class="text-xs sm:text-sm md:text-base">New offer 50% off</p>
        </div>
        <div class="absolute top-4 right-4 bg-white rounded-full p-2">
            <i class="far fa-heart text-gray-500"></i>
        </div>
        <div class="absolute top-4 left-4 bg-white text-black px-2 py-1 rounded-full text-xs">50% OFF</div>
    </div>

    <!-- New Jacket -->
    <div class="relative bg-white p-4 rounded-lg shadow-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
        <img alt="Person wearing a new jacket" class="w-full h-full object-cover rounded-lg" height="400" src="{{ asset('assets/images/pic3.jpg') }}" width="300"/>
        <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white">
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold">New Jacket</h2>
            <p class="text-xs sm:text-sm md:text-base">BUY ONE GET ONE FREE</p>
        </div>
        <div class="absolute top-4 right-4 bg-white rounded-full p-2">
            <i class="far fa-heart text-gray-500"></i>
        </div>
        <div class="absolute top-4 left-4 bg-white text-black px-2 py-1 rounded-full text-xs">36% OFF</div>
    </div>
</div>

<!-- New Arrival Section -->
<div class="text-center py-8">
    <h2 class="text-2xl font-bold">Produk Unggulan Kami</h2>
    <p class="text-blue-500">Harga Murah Harga Mewah</p>
</div>

<!-- Product Grid -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 sm:px-6 md:px-8">
    @foreach($products as $product)
    <div class="relative bg-white p-4 rounded-lg shadow-lg transition-transform transform hover:scale-105 duration-300">
        <a href="{{ route('product.show', $product->id) }}">
            @if($product->image)
            <div class="aspect-w-1 aspect-h-1">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover rounded-lg w-full h-auto" />
            </div>
            @else
            <div class="aspect-w-1 aspect-h-1">
                <img src="{{ asset('images/default.png') }}" alt="Default Image" class="object-cover rounded-lg w-full h-auto" />
            </div>
            @endif
            <div class="absolute top-2 left-2 sm:top-4 sm:left-4 bg-green-500 text-white px-1 sm:px-2 py-1 rounded-full text-xs">Best Seller</div>
            <div class="p-4 flex flex-col flex-grow">
                <h2 class="text-lg md:text-xl font-semibold mb-2 text-gray-800">{{ $product->name }}</h2>
                <p class="text-sm md:text-base text-gray-600 mb-2 flex-grow">{{ Str::limit($product->description, 100) }}</p>
                <p class="text-lg font-bold text-pink-600 mb-2">Rp {{ number_format($product->price, 2, ',', '.') }}</p>
            </div>
        </a>

    </div>
    @endforeach
</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
</script>
@endpush
