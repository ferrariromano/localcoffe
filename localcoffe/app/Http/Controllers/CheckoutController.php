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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:50',
            'postal_code' => 'required|string|max:10',
            'notes' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            $order = new Order($validatedData);
            $order->user_id = Auth::id();
            $order->status = 'pending';
            $order->subtotal = 0;
            $order->shipping_cost = 0;
            $order->grand_total = 0;
            $order->save();

            $userCart = Auth::user()->cart()->with('product')->get();

            foreach ($userCart as $item) {
                $order->orderItems()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            $subtotal = $userCart->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            $shippingCost = 10000; // Misalnya biaya pengiriman sebesar Rp 10.000
            $grandTotal = $subtotal + $shippingCost;

            $order->subtotal = $subtotal;
            $order->shipping_cost = $shippingCost;
            $order->grand_total = $grandTotal;
            $order->save();

            Auth::user()->cart()->delete();

            DB::commit();

            return redirect()->route('orders.payment', $order)->with([
                'success' => 'Pesanan berhasil dibuat. Silakan konfirmasi pembayaran.',
            ]);
        } catch (\Throwable $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Terjadi kesalahan, pesanan gagal diproses.');
        }
    }


}
