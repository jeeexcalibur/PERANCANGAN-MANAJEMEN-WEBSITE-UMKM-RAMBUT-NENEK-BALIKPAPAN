@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Profile Anda</h1>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <p><strong>Nama:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>Role:</strong> {{ $user->role }}</p>
        <!-- Tambahkan informasi lain yang diperlukan -->
    </div>
</div>
@endsection
