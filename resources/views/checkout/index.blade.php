@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>

    @if(session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <h2 class="text-xl font-semibold mb-2">Detail Transaksi</h2>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Produk</th>
                        <th class="py-2">Harga</th>
                        <th class="py-2">Jumlah</th>
                        <th class="py-2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td class="py-2">{{ $cart->product->name }}</td>
                            <td class="py-2">Rp {{ number_format($cart->product->price, 2, ',', '.') }}</td>
                            <td class="py-2">{{ $cart->quantity }}</td>
                            <td class="py-2">Rp {{ number_format($cart->product->price * $cart->quantity, 2, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="py-2 text-right font-bold">Total:</td>
                        <td class="py-2 font-bold">Rp {{ number_format($total, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mb-4">
            <label for="payment_method" class="block text-gray-700">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" required class="w-full border rounded p-2 mt-2">
                <option value="">Pilih Metode</option>
                <option value="QRIS" {{ old('payment_method') == 'QRIS' ? 'selected' : '' }}>QRIS</option>
                <option value="Transfer Bank" {{ old('payment_method') == 'Transfer Bank' ? 'selected' : '' }}>Transfer Bank</option>
            </select>
            @error('payment_method')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="payment_proof" class="block text-gray-700">Bukti Pembayaran</label>
            <input type="file" name="payment_proof" id="payment_proof" accept="image/*" required class="w-full border rounded p-2 mt-2">
            @error('payment_proof')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Proses Pembayaran</button>
    </form>
</div>
@endsection
