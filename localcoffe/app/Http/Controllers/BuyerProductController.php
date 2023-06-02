<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class BuyerProductController extends Controller
{
    public function index()
    {
        // Mendapatkan semua produk
        $products = Product::all();

        // Menampilkan halaman daftar produk untuk pembeli
        return view('buyer_products.index', compact('products'));
    }
}
