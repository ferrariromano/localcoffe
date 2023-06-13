<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        // Ambil daftar pesanan yang dimiliki oleh user yang sedang login
        $orders = Auth::user()->orders()->orderByDesc('created_at')->get();

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        // Cek apakah pesanan milik user yang sedang login
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Tampilkan halaman detail pesanan dengan rincian produk
        $orderItems = $order->orderItems()->with('product')->get();
        return view('orders.show', compact('order', 'orderItems'));
    }

    public function update(Request $request, Order $order)
    {
        // Cek apakah pesanan milik user yang sedang login
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Validasi request
        $validatedData = $request->validate([
            'status' => 'required|string|in:pending,processing,shipped,delivered,canceled',
        ]);

        // Update status pesanan
        $order->update($validatedData);

        return redirect()->back()->with('success', 'Status pesanan berhasil diupdate.');
    }

    public function showPaymentForm(Order $order)
    {
        // Cek apakah pesanan milik user yang sedang login
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('orders.payment', compact('order'));
    }

    public function processPayment(Request $request, Order $order)
    {
        // Cek apakah pesanan milik user yang sedang login
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Validasi request
        $validatedData = $request->validate([
            'payment_method' => 'required|string|in:bank,ewallet',
            'transfer_amount' => 'required|numeric|min:0',
            'transfer_account' => 'required|string|max:255',
            'receipt_image' => 'required|image|max:2048',
        ]);

        // Simpan gambar bukti pembayaran pada storage
        $path = $request->file('receipt_image')->store('receipts');

        // Buat instance baru dari model OrderPayment
        $payment = new OrderPayment($validatedData);
        $payment->order_id = $order->id;
        $payment->status = 'pending';
        $payment->receipt_image_path = $path;

        // Simpan data pembayaran pada order
        $order->payment()->save($payment);

        return redirect()->route('orders.show', $order)->with('success', 'Konfirmasi pembayaran berhasil disimpan.');
    }
}
