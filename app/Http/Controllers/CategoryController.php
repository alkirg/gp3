<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(Request $request)
    {
        $categories = Category::query()->orderBy('id', 'desc')->get();
        foreach ($categories as &$category) {
            $category->url = '/catalog/' . $category->id;
        }
        return view('catalog.index', ['categories' => $categories]);
    }

    function get(Category $category)
    {
        $products = Product::query()
            ->where('category_id', $category->id)
            ->orderBy('id', 'desc')
            ->paginate(6);
        foreach ($products as &$product) {
            $product->url = '/catalog/' . $category->id . '/' . $product->id;
        }
        return view('catalog.section', ['products' => $products, 'category' => $category]);
    }
}
