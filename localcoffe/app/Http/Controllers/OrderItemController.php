<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validasi data form
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'order_id' => 'required|exists:orders,id'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Simpan data item pesanan ke dalam database
        $item = new OrderItem();
        $item->order_id = 1; // Gantilah dengan ID pesanan yang valid
        $item->product_id = 1; // Gantilah dengan ID produk yang valid
        $item->quantity = 7;
        $item->save();

        return redirect()->route('orders.show', ['order' => $request->input('order_id')])->with('success', 'Item pesanan berhasil ditambahkan');
    }
}
