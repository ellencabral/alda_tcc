<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function update(Request $request): RedirectResponse
    {
        $user = User::with('shop')->find(auth()->id());

        $shop = $user->shop;

        $shop->fill($request->validate([
            'name' => ['required', 'string', 'max:150'],
            'url' => ['required', 'string', 'max:50', 'unique:'.Shop::class],
        ]));

        $shop->save();

        return redirect(route('shop.edit'))
            ->with('status', 'profile-updated');
    }
}
