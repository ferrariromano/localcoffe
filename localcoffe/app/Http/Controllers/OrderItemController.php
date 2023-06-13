<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Product;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderItemController extends Controller
{
    //
    public function store(Request $request, Order $order)
    {
        $product = Product::findOrFail($request->product_id);

        $item = new OrderItem([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'subtotal' => $product->price * $request->quantity
        ]);

        $order->orderItems()->save($item);

        $order->subtotal += $item->subtotal;
        $order->grand_total = $order->subtotal + $order->shipping_cost;
        $order->save();

        return redirect()->back()->with('success', 'Successfully added item to cart!');
    }

    public function update(Request $request, Order $order, OrderItem $item)
    {
        $item->quantity = $request->quantity;
        $item->subtotal = $item->product->price * $request->quantity;
        $item->save();

        $order->subtotal = $order->orderItems()->sum('subtotal');
        $order->grand_total = $order->subtotal + $order->shipping_cost;
        $order->save();

        return redirect()->back()->with('success', 'Cart item updated successfully!');
    }

    public function destroy(Order $order, OrderItem $item)
    {
        $item->delete();

        $order->subtotal = $order->orderItems()->sum('subtotal');
        $order->grand_total = $order->subtotal + $order->shipping_cost;
        $order->save();

        return redirect()->back()->with('success', 'Cart item deleted successfully!');
    }
}
