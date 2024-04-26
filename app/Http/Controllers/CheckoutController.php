<?php

namespace App\Http\Controllers;

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

    public function store(Request $request): RedirectResponse
    {
        $commission = Commission::create([
            'total' => $request->total,
            'payment' => $request->payment,
            'user_id' => $request->user()->id,
            'shop_id' => $request->shop_id,
            'shipping_address_id' => $request->address_id,
            'status_id' => 2,
        ]);

        $items = \Cart::content();

        foreach($items as $item) {
            $product = Product::where('name', $item->name)->first();

            CommissionProduct::create([
                'sale_price' => $item->price,
                'quantity' => $item->qty,
                'total' => $item->price * $item->qty,
                'product_id' => $product->id,
                'commission_id' => $commission->id,
            ]);
        }

        \Cart::destroy();

        return redirect(route('commissions.index'))->with('status', 'commission-stored');
    }
}
