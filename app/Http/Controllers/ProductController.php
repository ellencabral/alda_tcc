<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
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

    /**
     * Display the products details.
     */
    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Display the page to create a product.
     */
    public function create(Request $request): View
    {
        $categories = Category::orderBy('description', 'asc')->get();

        return view('products.create', [
            'shop_id' => $request->user()->shop->id,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => ['required', 'string', 'max:150'],
            'sale_price' => ['required'],
            'category_id' => ['required'],
        ]);

        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName()
                    . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);
        } else {
            dd($request->hasFile('image'));
        }

        $product = Product::create([
            'description' => $request->description,
            'image' => $imageName,
            'sale_price' => $request->sale_price,
            'observation' => $request->observation,
            'shop_id' => $request->user()->shop->id,
            'category_id' => $request->category_id,
        ]);

        return redirect(route('products.show', $product->id));
    }
}
