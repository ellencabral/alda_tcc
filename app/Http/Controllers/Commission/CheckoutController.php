<?php

namespace App\Http\Controllers\Commission;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(Request $request): View
    {
        try {
            $items = \Cart::content();

            $shippingAddresses = $request->user()->shippingAddresses()
                ->orderBy('is_default', 'desc')
                ->get();

            $total = (float) str_replace(',', '', \Cart::total());

            $cart_total = $total - \Cart::tax();

            foreach($items as $item) { //encontrar a loja dona do item na sacola
                $product = Product::findOrFail($item->id);

                break;
            }

            $shop = Shop::findOrFail($product->shop_id);
        } catch (\Exception $e) {
            return view('errors.404');
        }

        return view('checkout.index', [
            'user' => $request->user(),
            'items' => $items,
            'shippingAddresses' => $shippingAddresses,
            'shop' => $shop,
            'cart_total' => $cart_total,
        ]);
    }
}
