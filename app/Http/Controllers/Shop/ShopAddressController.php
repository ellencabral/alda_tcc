<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopAddressController extends Controller
{
    public function create(Request $request): View
    {
        $shop = $request->user()->shop;

        return view('shops.address.create', [
            'shop' => $shop,
        ]);
    }

    public function edit(Request $request): View
    {
        $shop = $request->user()->shop;

        return view('shops.address.edit', [
            'shop' => $shop,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $shop = $request->user()->shop;

        $shop->fill($request->validate([
            'street' => ['required', 'string', 'max:160'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['max:40'],
            'locality' => ['required', 'string', 'max:60'],
            'city' => ['required', 'string', 'max:90'],
            'region_code' => ['required', 'string', 'max:2'],
            'postal_code' => ['required'],
        ]));

        $shop->save();

        return redirect(route('artisan.shops.edit'));
    }

    public function remove(Request $request): RedirectResponse
    {
        $request->validateWithBag('shopAddressDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $shop = $request->user()->shop;

        $shop->fill([
            'street' => null,
            'number' => null,
            'complement' => null,
            'locality' => null,
            'city' => null,
            'region_code' => null,
            'postal_code' => null,
        ]);

        $shop->save();

        return redirect(route('artisan.shops.edit'));
    }
}
