<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ShopController extends Controller
{
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

        $request->user()->user_type_id = 3;
        $request->user()->save();

        return redirect(route('dashboard'));
    }

    /**
     * Display the user's shop form.
     */
    public function edit(Request $request): View
    {
        return view('shop.edit')
            ->with('shop', $request->user()->shop);
    }

    /**
     * Update the user's shop information.
     */
    public function update(Shop $shop, Request $request): RedirectResponse
    {
        $shop->fill($request->validate([
            'name' => ['required', 'string', 'max:150'],
            'url' => ['required', 'string', 'max:50', 'unique:'.Shop::class],
        ]));

        $shop->save();

        return redirect(route('shop.edit', $shop->id))
            ->with('status', 'profile-updated');
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

        $request->user()->user_type_id = 1;
        $request->user()->save();

        return Redirect::to('/dashboard');
    }
}
