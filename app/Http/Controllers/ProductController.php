<?php

namespace App\Http\Controllers;

use App\Models\Product; // Pastikan model Product diimport
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id); // ambil produk berdasarkan ID
        return view('products.detail', compact('product'));
    }
    
}
