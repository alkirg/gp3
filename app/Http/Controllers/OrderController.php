<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.list', [
            'orders' => Order::query()
                ->where('user_id', auth()->user()->id)
                ->paginate(4)
        ]);
    }

    public function cart(Product $product)
    {
        return view('order.cart', [
            'product' => $product,
            'user' => auth()->user()
        ]);
    }

    public function make(Request $request)
    {
        $product = Product::query()->findOrFail($request->product_id);
        if ($product) {
            $order = new Order();
            $order->user_id = auth()->user()->id;
            $order->email = $request->email;
            $order->product_id = $request->product_id;
            $order->total = $product->price;
            if ($order->save()) {
                return redirect()->route('order', ['order' => $order]);
            }
        }
        return view('order.cart', [
            'product' => $product,
            'user' => auth()->user()
        ]);
    }

    public function get(Order $order)
    {
        return view('order.detail', ['order' => $order]);
    }
}
