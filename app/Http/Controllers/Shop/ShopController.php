<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function dashboard(Request $request): View
    {
        return view('artisan.dashboard', [
            'shop' => $request->user()->shop,
        ]);
    }

    public function show($url): View
    {
        $shop = Shop::where('url', $url)->firstOrFail();

        return view('shops.show', [
            'shop' => $shop,
            'products' => $shop->products()->paginate(10),
        ]);
    }

    /**
     * Display the create shop form.
     */
    public function create(Request $request)
    {
        return view('shops.create',[
            'user' => $request->user()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:150'],
            'url' => ['required', 'string', 'min:3', 'max:50', 'unique:'.Shop::class, 'alpha_dash'],
        ]);

        Shop::create([
            'name' => $request->name,
            'url' => $request->url,
            'user_id' => auth()->id(),
        ]);

        $request->user()->revokePermissionTo(['create shop']);
        $request->user()->givePermissionTo(['activate shop']);

        return redirect(route('home'));
    }

    /**
     * Display the user's shop form.
     */
    public function edit(Request $request): View
    {
        return view('shops.edit', [
           'shop' => $request->user()->shop,
        ]);
    }

    /**
     * Delete the user's shop.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('shopDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $request->user()->shop->delete();

        $request->user()->syncRoles('user');

        $request->user()->givePermissionTo('create shop');

        return redirect(route('home'));
    }
}
