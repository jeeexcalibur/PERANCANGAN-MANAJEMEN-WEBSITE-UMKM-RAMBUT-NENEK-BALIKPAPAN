<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login'); // Nama view form login customer
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cek apakah kredensial sesuai
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            // Periksa role user
            if ($user->role === 'USER') {
                // Redirect ke dashboard customer
                return redirect()->intended('/customer/dashboard');
            } else {
                // Logout jika user bukan customer
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Login gagal, cek email dan password Anda.']);
            }
        }

        // Jika gagal login
        return redirect()->back()->withErrors(['email' => 'Login gagal, cek email dan password Anda.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/customer/login');
    }
}

