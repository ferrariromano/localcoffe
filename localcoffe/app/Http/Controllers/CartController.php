<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
        public function index()
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = Product::whereIn('id', $productIds)->get();
        $total = 0;

        foreach ($products as $product) {
            $quantity = $cart[$product->id]['quantity'];
            $subtotal = $product->price * $quantity;
            $total += $subtotal;
        }

        // Biaya pengiriman sebesar Rp10.000
        $shippingCost = 10000;

        return view('cart.index', compact('cart', 'products', 'total', 'shippingCost'));
    }


    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Tambahkan produk ke keranjang belanja
        $cart = session()->get('cart', []);

        if (isset($cart[$validatedData['product_id']])) {
            $cart[$validatedData['product_id']]['quantity'] += $validatedData['quantity'];
        } else {
            $product = Product::find($validatedData['product_id']);
            $cart[$validatedData['product_id']] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $validatedData['quantity']
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang belanja.');
    }
    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang belanja');
    }


    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang belanja');
    }
}
