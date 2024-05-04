<?php

namespace App\Http\Controllers\Commission;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(Request $request): View
    {
        $items = \Cart::content();

        $shippingAddresses = ShippingAddress::where('user_id', $request->user()->id)
            ->orderBy('is_default', 'desc')
            ->get();

        $total = (float) str_replace(',', '', \Cart::total());

        $cart_total = $total - \Cart::tax();

        foreach($items as $item) { //encontrar a loja dona do item na sacola
            $product = Product::find($item->id);
            break;
        }

        return view('checkout.index', [
            'user' => $request->user(),
            'items' => $items,
            'shippingAddresses' => $shippingAddresses,
            'shop' => $product->shop,
            'cart_total' => $cart_total,
        ]);
    }


}
