<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryProductController extends Controller
{
    public function index(Category $category): View
    {
        $products = Product::where('category_id', $category->id)->paginate(10);

        return view('categories.products.index', [
            'category' => $category,
            'products' => $products,
        ]);
    }
}
