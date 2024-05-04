<?php

namespace App\Http\Controllers\Commission;

use App\Http\Controllers\Controller;
use App\Mail\CommissionStored;
use App\Mail\CommissionUpdated;
use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class CommissionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $commission = Commission::create([
            'total' => $request->total,
            'payment' => $request->payment,
            'user_id' => $request->user()->id,
            'shop_id' => $request->shop_id,
            'shipping_address_id' => $request->address_id,
            'status_id' => 2,
        ]);

        $items = \Cart::content();

        foreach($items as $item) {
            $product = Product::where('name', $item->name)->first();

            CommissionProduct::create([
                'sale_price' => $item->price,
                'quantity' => $item->qty,
                'total' => $item->price * $item->qty,
                'product_id' => $product->id,
                'commission_id' => $commission->id,
            ]);
        }

        Mail::to($request->user()->email, $request->user()->name)
            ->send(new CommissionStored($commission, 'user'));

        Mail::to($commission->shop->user->email, $commission->shop->user->name)
            ->send(new CommissionStored($commission, 'shop'));

        Mail::to($commission->user->email, $commission->user->name)
            ->send(new CommissionUpdated($commission));

        \Cart::destroy();

        return redirect(route('commissions.index'))
            ->with('status', 'commission-stored');
    }

    public function index(Request $request): View
    {
        $commissions = $request->user()->commissions()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('commissions.index', [
            'commissions' => $commissions,
        ]);
    }

    public function show(Commission $commission, Request $request): View
    {
        $userCommission = $request->user()->commissions()->where('id', $commission->id)->firstOrFail();

        return view('commissions.show', [
            'commission' => $commission,
            'commissionProducts' => $userCommission->commissionProducts()->get(),
        ]);
    }

    public function destroy(Commission $commission, Request $request): RedirectResponse
    {
        $request->validateWithBag('commissionDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $commission->delete();

        return redirect(route('commissions.index'))
            ->with('status', 'commission-destroyed');
    }
}
