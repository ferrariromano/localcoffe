<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin')->only('update');
    }

    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::all();
        return view('orders.index', compact('products'));
    }

    // Menampilkan form order produk
    public function create()
    {
        $products = Product::all();

        return view('orders.create', compact('products'));
    }

    // Membuat order baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'buyer_name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:255',
            'payment_method' => 'required|in:bank,e-wallet,other'
        ]);

        $product = Product::findOrFail($request->input('product_id'));

        $order = new Order([
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'total_price' => $product->price * $request->input('quantity'),
            'buyer_name' => $request->input('buyer_name'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'payment_method' => $request->input('payment_method')
        ]);

        // Tambahkan biaya tambahan tergantung pada metode pembayaran
        switch ($order->payment_method) {
            case 'bank':
                $additional_fee = 5000;
                break;
            case 'e-wallet':
                $additional_fee = 7000;
                break;
            default:
                $additional_fee = 0;
                break;
        }

        $order->total_price += $additional_fee;
        $order->save();

        return redirect()->route('orders.show', $order->id)->with('success', 'Order berhasil dibuat');
    }

    // Menampilkan detail order berdasarkan id
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    // Mengubah status order oleh admin
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Processing,Shipped,Delivered,Canceled'
        ]);

        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('orders.show', $order->id)->with('success', 'Status pesanan berhasil diperbarui');
    }

    // Menampilkan form untuk mengubah order
    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }
}
