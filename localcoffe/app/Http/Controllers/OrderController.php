<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
        public function index()
    {
        $orders = auth()->user()->orders;
        return view('orders.index', compact('orders'));
    }

    public function confirm(Order $order)
    {
        $order->status = 'confirmed';
        $order->save();

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dikonfirmasi.');
    }
}
