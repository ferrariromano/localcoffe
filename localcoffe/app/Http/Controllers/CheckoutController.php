<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('checkout.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        // Buat order baru
        $order = new Order();
        $order->user_id = auth()->id();
        $order->status = 'pending';
        $order->payment_method = $request->input('payment_method');
        $order->additional_fee = 10000; // Contoh biaya tambahan Rp 10.000 (ganti sesuai kebutuhan)
        $order->save();

        // Buat order item baru
        foreach ($cart as $productId => $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $productId;
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();
        }

        // Kosongkan keranjang belanja
        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Pembayaran berhasil dilakukan. Silahkan tunggu konfirmasi.');
    }

    public function create(Request $request)
    {
        // Ambil keranjang belanja dari session
        $cart = $request->session()->get('cart', []);

        // Jika keranjang kosong, kembali ke halaman keranjang belanja
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('warning', 'Keranjang belanja masih kosong.');
        }

        // Buat pesanan baru dan simpan ke database
        $order = new Order();
        $order->user_id = auth()->id(); // jika menggunakan autentikasi pengguna
        $order->total_price = 0; // total harga dihitung nanti setelah menambahkan produk
        $order->save();

        // Tambahkan setiap produk ke dalam pesanan
        foreach ($cart as $productId => $item) {
            $product = Product::findOrFail($productId);
            $quantity = $item['quantity'];

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $product->id;
            $orderItem->quantity = $quantity;
            $orderItem->save();

            // Update total harga pesanan
            $order->total_price += $product->price * $quantity;
        }

        // Simpan total harga pesanan ke dalam database
        $order->save();

        // Hapus keranjang belanja dari session
        $request->session()->forget('cart');

        // Alihkan pengguna ke halaman konfirmasi pemesanan dengan ID pesanan
        return redirect()->route('orders.show', $order->id)->with('success', 'Pesanan berhasil dibuat.');
    }

    public function show(Order $order)
    {
        // Tampilkan halaman konfirmasi pemesanan dengan rincian pesanan
        return view('orders.show', compact('order'));
    }

}
