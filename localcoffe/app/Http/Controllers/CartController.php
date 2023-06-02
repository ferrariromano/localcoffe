<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index()
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Tampilkan halaman keranjang dengan produk di dalamnya
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $product_id)
    {
        // Cari produk berdasarkan id
        $product = Product::findOrFail($product_id);

        // Ambil data keranjang dari session atau buat array kosong jika belum ada
        $cart = session()->get('cart', []);

        // Tambahkan produk ke dalam keranjang
        $cart[$product_id] = [
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1, // Anda bisa menggantinya sesuai kebutuhan
        ];

        // Simpan keranjang kembali ke session
        session()->put('cart', $cart);

        // Redirect ke halaman list produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function remove(Request $request, $product_id)
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Hapus produk dari keranjang
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
        }

        // Simpan keranjang kembali ke session
        session()->put('cart', $cart);

        // Redirect ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang');
    }
}
