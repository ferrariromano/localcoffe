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
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = DB::table('products')->whereIn('id', $productIds)->get();
        $total = 0;

        foreach ($products as $product) {
            $quantity = $cart[$product->id]['quantity'];
            $subtotal = $product->price * $quantity;
            $total += $subtotal;
        }

        // Biaya pengiriman sebesar Rp10.000
        $shippingCost = 10000;
        $grandTotal = $total + $shippingCost;

        return view('checkout.index', compact('cart', 'products', 'total', 'shippingCost', 'grandTotal'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        $productIds = array_keys($cart);
        $products = DB::table('products')->whereIn('id', $productIds)->get();
        $total = 0;

        foreach ($products as $product) {
            $quantity = $cart[$product->id]['quantity'];
            $subtotal = $product->price * $quantity;
            $total += $subtotal;
        }

        // Biaya pengiriman sebesar Rp10.000
        $shippingCost = 10000;
        $grandTotal = $total + $shippingCost;

        // Simpan data order ke database
        $order = new Order();
        $order->user_id = Auth::id();
        $order->total_price = $grandTotal;
        $order->status = 'pending';
        $order->save();

        // Simpan detail order ke database
        foreach ($products as $product) {
            $quantity = $cart[$product->id]['quantity'];
            $subtotal = $product->price * $quantity;

            DB::table('order_details')->insert([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            ]);
        }

        // Kosongkan keranjang belanja
        session()->forget('cart');

        return redirect()->route('order.show', $order->id)->with('success', 'Pesanan berhasil dibuat.');
    }

    // public function show(Order $order)
    // {
    //     // Tampilkan halaman konfirmasi pemesanan dengan rincian pesanan
    //     return view('orders.show', compact('order'));
    // }

}
