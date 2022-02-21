<?php

namespace App\Http\Controllers;

use App\Mail\OrderMake;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            $order->name = $request->name;
            $order->product_id = $request->product_id;
            $order->total = $product->price;
            if ($order->save()) {
                Mail::to(Setting::settings()->email)->send(new OrderMake($order));
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
