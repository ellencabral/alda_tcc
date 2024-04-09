<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display all the products from the shop.
     */
    public function index(Request $request): View
    {
        return view('products.index', [
            'shop_name' => $request->user()->shop->name,
            'products' => $request->user()->shop->products,
        ]);
    }

    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }
}
