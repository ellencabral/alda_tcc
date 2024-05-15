<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Mail\CommissionUpdated;
use App\Models\Commission;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ShopCommissionController extends Controller
{
    public function index(Request $request): View
    {
        $shopCommissions = $request->user()->shop->commissions()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('shops.commissions.index', [
            'shopCommissions' => $shopCommissions,
        ]);
    }

    public function show(Commission $commission, Request $request)
    {
        $request->user()->shop->commissions()->findOrFail($commission->id);

        return view('shops.commissions.show', [
            'commission' => $commission,
            'commissionProducts' => $commission->commissionProducts()->get(),
            'statuses' => Status::all()
        ]);
    }

    public function update(Commission $commission, Request $request): RedirectResponse
    {
        $commission->status_id = $request->status_id;

        $commission->save();

        Mail::to($commission->user->email, $commission->user->name)
            ->send(new CommissionUpdated($commission));

        return redirect(route('artisan.commissions.show', $commission->id));
    }
}
