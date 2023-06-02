<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Tampilkan halaman checkout
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        // Validasi input dari user
        $validatedData = $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
        ]);

        // Buat order baru untuk pembeli
        $order = new Order();
        $order->user_id = auth()->id();
        $order->status = 'pending';
        $order->additional_fee = 10000; // Contoh biaya tambahan Rp 10.000, ganti sesuai kebutuhan
        $order->save();

        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Buat order item baru untuk setiap produk dalam keranjang
        foreach ($cart as $product_id => $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product_id;
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

        // Kosongkan keranjang
        session()->forget('cart');

        // Redirect ke halaman pembayaran
        return redirect()->route('payment.index', ['order' => $order->id]);
    }

}
