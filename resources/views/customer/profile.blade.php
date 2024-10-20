@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg transition-shadow duration-300 hover:shadow-2xl max-w-md w-full">
        <h1 class="text-4xl font-bold text-center mb-8 text-gray-800">Profil Anda</h1>

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Nama:</h2>
            <button id="edit-button" class="flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-200">
                <i class="fas fa-edit text-lg"></i>
            </button>
        </div>
        <p id="user-name" class="text-xl text-gray-700 mb-4">{{ $user->name }}</p>

        <div class="border-b border-gray-300 mb-6"></div>

        <h2 class="text-2xl font-semibold text-gray-800">Email:</h2>
        <p class="text-xl text-gray-700 mb-6">{{ $user->email }}</p>
        
        <form id="edit-form" class="hidden mt-4" method="POST" action="{{ route('profile.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="flex items-center space-x-4 mb-4">
                <input type="text" name="name" value="{{ $user->name }}" class="border border-gray-300 rounded-lg px-4 py-2 flex-grow focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150" required placeholder="Masukkan nama baru">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200">Simpan</button>
            </div>
        </form>

        <div class="mt-4">
            <button id="cancel-button" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition duration-200 hidden">Batal</button>
        </div>
    </div>
</div>

<script>
    const editButton = document.getElementById('edit-button');
    const editForm = document.getElementById('edit-form');
    const cancelButton = document.getElementById('cancel-button');

    editButton.addEventListener('click', () => {
        editForm.classList.toggle('hidden');
        editButton.classList.toggle('hidden');
        cancelButton.classList.toggle('hidden');
        editForm.classList.toggle('transition-opacity');
        editForm.classList.toggle('opacity-0');
        setTimeout(() => {
            editForm.classList.toggle('opacity-100');
        }, 10);
    });

    cancelButton.addEventListener('click', () => {
        editForm.classList.add('hidden');
        editButton.classList.remove('hidden');
        cancelButton.classList.add('hidden');
    });
</script>
@endsection

@section('scripts')
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
