<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function show()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('customer.profile', compact('user')); // Pastikan view 'customer.profile' sudah ada
    }
}
