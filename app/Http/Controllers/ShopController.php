<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function dashboard(): View
    {
        return view('shop.dashboard');
    }
    public function show($url): View
    {
        $shop = Shop::where('url', $url)->first();
        $products = Product::where('shop_id', $shop->id)->paginate(10);

        return view('shop.show', [
            'shop' => $shop,
            'products' => $products,
        ]);
    }

    /**
     * Display the create shop form.
     */
    public function create(Request $request): View
    {
        return view('shop.create', [
            'user' => $request->user(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'url' => ['required', 'string', 'max:50', 'unique:'.Shop::class],
        ]);

        Shop::create([
            'name' => $request->name,
            'url' => $request->url,
            'user_id' => auth()->id(),
        ]);

        //$request->user()->user_type_id = 3;
        //$request->user()->save();
        ;
        $request->user()->syncRoles('artisan');

        return redirect(route('home'));
    }

    /**
     * Display the user's shop form.
     */
    public function edit(Request $request): View
    {
        $shop = $request->user()->shop;

        return view('shop.edit', [
           'shop' => $shop,
        ]);
    }

    /**
     * Update the user's shop information.
     */
    public function update(Request $request): RedirectResponse
    {
        $shop = $request->user()->shop;

        $shop->fill($request->validate([
            'name' => ['required', 'string', 'max:150'],
            'url' => ['required', 'string', 'max:50', Rule::unique(Shop::class)->ignore($request->user()->id)],
        ]));

        $shop->save();

        return redirect(route('shop.edit', $shop->id))
            ->with('status', 'profile-updated');
    }

    public function editAddress(Request $request): View
    {
        $shop = $request->user()->shop;

        return view('shop.address.edit', [
            'shop' => $shop,
        ]);
    }

    public function updateAddress(Request $request): RedirectResponse
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

        $shop->postal_code = str_replace(' ', '', $request->postal_code);

        $shop->save();

        return redirect(route('artisan.shop.edit'));
    }

    public function removeAddress(Request $request): RedirectResponse
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

        return redirect(route('artisan.shop.edit'));
    }

    /**
     * Delete the user's shop.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('shopDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $shop = $request->user()->shop;

        $shop->delete();

        //$request->user()->user_type_id = 1;
        //$request->user()->save();

        $request->user()->syncRoles('user');

        return Redirect::to('/home');
    }
}
