<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShopRequest;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display the user's shop form.
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
}
