<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Product;
use App\Models\ShippingAddress;
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
                $url = view('commissions.shipping', [
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

        $addresses = ShippingAddress::where('user_id', $request->user()->id)->get();

        $cart_total = \Cart::total() - \Cart::tax();

        foreach($items as $item) {
            $product = Product::find($item->id);
            break;
        }

        return view('commissions.checkout', [
            'user' => $request->user(),
            'items' => $items,
            'addresses' => $addresses,
            'shop' => $product->shop,
            'cart_total' => number_format($cart_total, 2, ',', '.'),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        CommissionProduct::create([

        ]);

        Commission::create([

        ]);

        $shipping->store();

        return redirect(route('commissions.store'));
    }
}
