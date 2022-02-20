<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get(Request $request)
    {
        return view('catalog.element', [
            'product' => Product::findOrFail($request->product),
            'similar' => self::similar($request->category)
        ]);
    }

    public static function similar(int $category = 0)
    {
        if ($category) {
            return Product::query()
                ->where('category_id', $category)
                ->limit(3)
                ->inRandomOrder()
                ->get();
        }
        return Product::query()
            ->limit(3)
            ->inRandomOrder()
            ->get();
    }
}
