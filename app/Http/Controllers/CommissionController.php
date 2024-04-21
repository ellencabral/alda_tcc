<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommissionController extends Controller
{
    public function shipping(Request $request): View
    {
        $items = \Cart::content();

        if($items->isNotEmpty()) {
            foreach($items as $item) {
                $product = Product::find($item->id);
                $url = view('commission.shipping', [
                    'user' => $request->user(),
                    'shop' => $product->shop,
                ]);
                break;
            }
        } else {
            $url = view('shopping-bag', compact('items'));
        }

        return $url;
    }
    public function checkout(Request $request): View
    {
        $items = \Cart::content();

        foreach($items as $item) {
            $product = Product::find($item->id);
            break;
        }

        return view('commission.checkout', [
            'user' => $request->user(),
            'items' => $items,
            'shop' => $product->shop,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        CommissionProduct::create([

        ]);

        Commission::create([

        ]);

        $shipping->store();

        return redirect(route('commission.store'));
    }
}
