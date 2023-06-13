<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $userCart = Auth::user()->cart()->with('product')->get();
        $subtotal = $userCart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $shippingCost = 10000; // misalnya biaya pengiriman sebesar Rp 10.000
        $grandTotal = $subtotal + $shippingCost;
        $product = null; // Tambahkan ini untuk menginisialisasi variabel $product pada view checkout

        return view('checkout.index', compact('userCart', 'subtotal', 'shippingCost', 'grandTotal', 'product'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Ambil cart milik user yang sedang login
        $userCart = Auth::user()->cart()->with('product')->get();

        // Hitung total harga dan biaya pengiriman
        $subtotal = $userCart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $shippingCost = 10000; // biaya pengiriman tetap Rp 10.000
        $grandTotal = $subtotal + $shippingCost;

        // Buat instance baru dari model Order
        $order = new Order($validatedData);
        $order->user_id = Auth::id();
        $order->subtotal = $subtotal;
        $order->shipping_cost = $shippingCost;
        $order->grand_total = $grandTotal;
        $order->status = 'pending';
        $order->save();

        // Simpan tiap item pada cart sebagai order item
        foreach ($userCart as $item) {
            $orderItem = new OrderItem([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
            $order->orderItems()->save($orderItem);
        }

        // Hapus semua item pada cart
        Auth::user()->cart()->delete();

        return redirect()->route('orders.show', $order)->with('success', 'Pesanan Anda berhasil diproses. Silahkan lakukan pembayaran.');
    }

}
