<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\Shop;
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

        $addresses = ShippingAddress::where('user_id', $request->user()->id)
                                    ->orderBy('is_default', 'desc')
                                    ->get();

        $cart_total = \Cart::total() - \Cart::tax();

        foreach($items as $item) { //encontrar a loja dona do item na sacola
            $product = Product::find($item->id);
            break;
        }

        return view('commissions.checkout', [
            'user' => $request->user(),
            'items' => $items,
            'addresses' => $addresses,
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

            $products = CommissionProduct::create([
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

    public function show(Request $request): View
    {
        $commission = Commission::where('id', $request->commission)->first();

        $commissionProducts = CommissionProduct::where('commission_id', $commission->id)->get();

        return view('commissions.show', [
            'commission' => $commission,
            'commissionProducts' => $commissionProducts,
        ]);
    }

    public function index(Request $request): View
    {
        $commissions = Commission::where('user_id', $request->user()->id)->get();

        return view('commissions.index', [
            'commissions' => $commissions,
        ]);
    }

    public function shopCommissions(Request $request): View
    {
        $commissions = Commission::where('shop_id', $request->user()->shop->id)->get();

        return view('shop.commissions.index', [
            'commissions' => $commissions,
        ]);

    }
}
