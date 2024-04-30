<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ShopCustomizationController extends Controller
{
    public function edit(Request $request): View
    {
        return view('shops.customization.edit', [
            'shop' => $request->user()->shop,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        //

        return redirect(route('shops.customization.edit'));
    }
}
