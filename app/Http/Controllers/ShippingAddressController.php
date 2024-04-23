<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShippingAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShippingAddressController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $addresses = $request->user()->shipping_addresses()->get();

        if($addresses->isEmpty()) {
            $default = true;
        } else {
            $default = false;
        }

        $postal_code = str_replace(' ', '', $request->postal_code);

        $request->validate([
            'street' => ['required', 'string', 'max:160'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['max:40'],
            'locality' => ['required', 'string', 'max:60'],
            'city' => ['required', 'string', 'max:90'],
            'region_code' => ['required', 'string', 'max:2'],
            'postal_code' => ['required'],
        ]);

        $shipping_address = ShippingAddress::create([
            'street' => $request->street,
            'number' => $request->number,
            'complement' => $request->complement,
            'locality' => $request->locality,
            'city' => $request->city,
            'region_code' => $request->region_code,
            'postal_code' => $postal_code,
            'is_default' => $default,
            'user_id' => $request->user()->id,
        ]);

        return redirect(route('profile.edit'));
    }

    public function edit(Request $request): View
    {
        $address = ShippingAddress::find($request->id);

        return view('profile.shipping-address.edit', [
            'address' => $address,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $shipping_address = ShippingAddress::find($request->id);

        if($request->has('is_default')) { // se o checkbox estiver marcado, trocar o antigo padrão para falso e atualizar o atual para true
            ShippingAddress::where('is_default', true)->update(['is_default' => false]);

            $shipping_address->is_default = true;
        } else {
            $shipping_address->is_default = false;
        }

        $shipping_address->fill($request->validate([
            'street' => ['required', 'string', 'max:160'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['max:40'],
            'locality' => ['required', 'string', 'max:60'],
            'city' => ['required', 'string', 'max:90'],
            'region_code' => ['required', 'string', 'max:2'],
            'postal_code' => ['required'],
        ]));

        $shipping_address->postal_code = str_replace(' ', '', $request->postal_code);

        $shipping_address->save();

        return redirect(route('profile.shipping-address.edit', $request->id));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('shippingAddressDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $shipping_address = ShippingAddress::find($request->id);

        $shipping_address->delete();

        if($shipping_address->is_default) { // se o endereço deletado for padrão, tornar padrão o outro primeiro que aparecer
            $other_shipping_address = ShippingAddress::where('user_id', $request->user()->id)->first();

            if($other_shipping_address) {
                $other_shipping_address->update(['is_default' => true]);
            }
        }


        return redirect(route('profile.edit'));
    }
}
