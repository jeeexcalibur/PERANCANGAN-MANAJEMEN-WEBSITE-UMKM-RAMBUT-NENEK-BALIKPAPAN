<?php

namespace App\Http\Controllers;

use App\Models\Transaction; // Pastikan model Transaction sudah ada
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Menampilkan daftar transaksi pengguna.
     */
    public function index()
    {
        $user = Auth::user(); // Mendapatkan pengguna yang sedang login
        $transactions = Transaction::where('user_id', $user->id)->get(); // Mengambil transaksi berdasarkan pengguna
        return view('transactions.index', compact('transactions'));
    }
}
