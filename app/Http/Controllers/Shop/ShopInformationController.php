<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ShopInformationController extends Controller
{
    public function edit(Request $request): View
    {
        return view('shops.information.edit', [
            'shop' => $request->user()->shop,
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
            'url' => ['required', 'string', 'max:50', 'regex:/^\S*$/u', Rule::unique(Shop::class)->ignore($request->user()->shop->id)],
        ],
        [
            'url.regex' => 'O campo url não pode possuir espaços em branco.',
        ]));

        $shop->save();

        return redirect(route('artisan.shops.information.edit'))
            ->with('status', 'profile-updated');
    }
}
