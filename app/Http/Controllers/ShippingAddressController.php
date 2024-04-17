<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShippingAddressController extends Controller
{
    public function index(Request $request): View
    {
        $items = \Cart::content();
        return view('shipping-address.form', [
            'user' => $request->user(),
            'items' => $items,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->user()->fill($request->validate([

        ]));

        return redirect(route('commission-summary'));
    }
}
