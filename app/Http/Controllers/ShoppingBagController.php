<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\CartItem;

class ShoppingBagController extends Controller
{
    public function index(): View
    {
        $items = Cart::content();

        return view('shopping-bag', compact('items'));
    }

    public function add(Request $request): RedirectResponse
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->description,
            'qty' => $request->quantity,
            'price' => $request->sale_price,
            'weight' => 0,
            'options' => [
                'image' => $request->image,
            ],
        ]);

        return redirect(route('shopping-bag'));
    }

    public function update(Request $request, $rowId): RedirectResponse
    {
        Cart::update($rowId, $request->quantity);

        return redirect(route('shopping-bag'));
    }

    public function delete($rowId): RedirectResponse
    {
        Cart::remove($rowId);

        return redirect(route('shopping-bag'));
    }

    public function destroy(): RedirectResponse
    {
        Cart::destroy();

        return redirect(route('shopping-bag'));
    }
}
