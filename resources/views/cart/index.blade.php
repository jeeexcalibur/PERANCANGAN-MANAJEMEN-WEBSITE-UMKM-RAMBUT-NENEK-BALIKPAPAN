@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Keranjang Belanja</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($carts->isEmpty())
        <p>Kosong</p>
    @else
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2">Produk</th>
                    <th class="py-2">Harga</th>
                    <th class="py-2">Jumlah</th>
                    <th class="py-2">Total</th>
                    <th class="py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $grandTotal = 0; @endphp
                @foreach($carts as $cart)
                    @php
                        $total = $cart->product->price * $cart->quantity;
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td class="py-2">
                            <div class="flex items-center">
                                @if($cart->product->image)
                                    <img src="{{ asset('storage/' . $cart->product->image) }}" alt="{{ $cart->product->name }}" class="w-16 h-16 object-cover mr-4">
                                @else
                                    <img src="{{ asset('images/default.png') }}" alt="Default Image" class="w-16 h-16 object-cover mr-4">
                                @endif
                                <span>{{ $cart->product->name }}</span>
                            </div>
                        </td>
                        <td class="py-2">Rp {{ number_format($cart->product->price, 2, ',', '.') }}</td>
                        <td class="py-2">
                            <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="flex items-center">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" value="{{ $cart->quantity }}" min="1" class="w-16 p-1 border rounded mr-2">
                                <button type="submit" class="bg-blue-500 text-white px-2 py-1 rounded">Update</button>
                            </form>
                        </td>
                        <td class="py-2">Rp {{ number_format($total, 2, ',', '.') }}</td>
                        <td class="py-2">
                            <form action="{{ route('cart.remove', $cart->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="py-2 text-right font-bold">Total:</td>
                    <td class="py-2 font-bold">Rp {{ number_format($grandTotal, 2, ',', '.') }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4">
            <a href="{{ route('checkout') }}" class="bg-green-500 text-white px-4 py-2 rounded">Lanjutkan ke Pembayaran</a>
        </div>
    @endif
</div>
@endsection
