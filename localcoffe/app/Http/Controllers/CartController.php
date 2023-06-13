<?php

namespace App\Http\Controllers;
use App\Models\Product;

use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    //
    public function index()
    {
        $userCart = Auth::user()->cart()->with('product')->get();
        $subtotal = $userCart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('userCart', 'subtotal'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Auth::user()->cart()->where('product_id', $validatedData['product_id'])->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $validatedData['quantity']);
        } else {
            $cartItem = new CartItem($validatedData);
            $cartItem->user_id = Auth::id();
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update($validatedData);

        return redirect()->back()->with('success', 'Keranjang berhasil diupdate.');
    }

    public function destroy(CartItem $cartItem)
    {
        $cartItem->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
