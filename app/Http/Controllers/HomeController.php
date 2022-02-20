<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $products = Product::query()
            ->orderBy('id', 'desc')
            ->paginate(6);
        return view('index', ['products' => $products]);
    }
}
