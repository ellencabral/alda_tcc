<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShippingAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShippingAddressController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $addresses = $request->user()->shippingAddresses()->get();

        if($addresses->isEmpty()) {
            $default = true;
        } else {
            $default = false;
        }

        $postalCode = str_replace(' ', '', $request->postal_code);

        $request->validate([
            'street' => ['required', 'string', 'max:160'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['max:40'],
            'locality' => ['required', 'string', 'max:60'],
            'city' => ['required', 'string', 'max:90'],
            'region_code' => ['required', 'string', 'max:2'],
            'postal_code' => ['required'],
        ]);

        ShippingAddress::create([
            'street' => $request->street,
            'number' => $request->number,
            'complement' => $request->complement,
            'locality' => $request->locality,
            'city' => $request->city,
            'region_code' => $request->region_code,
            'postal_code' => $postalCode,
            'is_default' => $default,
            'user_id' => $request->user()->id,
        ]);

        return redirect(route('profile.edit'));
    }

    public function edit(Request $request): View
    {
        $address = ShippingAddress::find($request->id);

        return view('shipping-address.edit', [
            'address' => $address,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $shippingAddress = ShippingAddress::find($request->id);
        $oldDefaultShippingAddress = ShippingAddress::where('is_default', true);

        if($request->has('is_default')) {
            // se o checkbox estiver marcado,
            // trocar o antigo padrão para falso e atualizar o atual para true
            $oldDefaultShippingAddress->update(['is_default' => false]);
            $shippingAddress->is_default = true;
        } else {
            if($shippingAddress->is_default) {
                $shippingAddress->is_default = true;
            } else {
                $shippingAddress->is_default = false;
            }
        }

        $shippingAddress->fill($request->validate([
            'street' => ['required', 'string', 'max:160'],
            'number' => ['required', 'string', 'max:20'],
            'complement' => ['max:40'],
            'locality' => ['required', 'string', 'max:60'],
            'city' => ['required', 'string', 'max:90'],
            'region_code' => ['required', 'string', 'max:2'],
            'postal_code' => ['required'],
        ]));

        $shippingAddress->postal_code = str_replace(' ', '', $request->postal_code);

        $shippingAddress->save();

        return redirect(route('profile.shipping-address.edit', $request->id));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('shippingAddressDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $shippingAddress = ShippingAddress::find($request->id);

        $shippingAddress->delete();

        if($shippingAddress->is_default) { // se o endereço deletado for padrão, tornar padrão o outro primeiro que aparecer
            $otherShippingAddress = ShippingAddress::where('user_id', $request->user()->id)->first();

            if($otherShippingAddress) {
                $otherShippingAddress->update(['is_default' => true]);
            }
        }

        return redirect(route('profile.edit'));
    }
}
