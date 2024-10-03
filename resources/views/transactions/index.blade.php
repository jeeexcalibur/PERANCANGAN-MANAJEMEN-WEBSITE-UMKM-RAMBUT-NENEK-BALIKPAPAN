@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">ID Transaksi</th>
                <th class="py-2">Produk</th>
                <th class="py-2">Jumlah</th>
                <th class="py-2">Total Harga</th>
                <th class="py-2">Status</th>
                <th class="py-2">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td class="border px-4 py-2">{{ $transaction->id }}</td>
                <td class="border px-4 py-2">{{ $transaction->product_name }}</td>
                <td class="border px-4 py-2">{{ $transaction->quantity }}</td>
                <td class="border px-4 py-2">{{ $transaction->total_price }}</td>
                <td class="border px-4 py-2">{{ $transaction->status }}</td>
                <td class="border px-4 py-2">{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
