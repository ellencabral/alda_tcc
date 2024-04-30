<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Status;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShopCommissionController extends Controller
{
    public function index(Request $request): View
    {
        $shopCommissions = Commission::where('shop_id', $request->user()->shop->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('shops.commissions.index', [
            'shopCommissions' => $shopCommissions,
        ]);
    }

    public function show(Commission $commission, Request $request)
    {
        $shopCommissions = Commission::where('shop_id', $request->user()->shop->id)->get();

        if($shopCommissions->isNotEmpty()) {
            foreach($shopCommissions as $slug) {
                if($slug->id == $commission->id) {
                    $commissionProducts = CommissionProduct::where('commission_id', $commission->id)->get();

                    $statuses = Status::all();

                    $url = view('shops.commissions.show', [
                        'commission' => $commission,
                        'commissionProducts' => $commissionProducts,
                        'statuses' => $statuses,
                    ]);
                    break;
                }
                $url = redirect(route('artisan.commissions.index'));
            }
        } else {
            $url = redirect(route('artisan.commissions.index'));
        }

        return $url;
    }

    public function update(Commission $commission, Request $request): RedirectResponse
    {
        $commission->status_id = $request->status_id;

        $commission->save();

        return redirect(route('artisan.commissions.show', $commission->id));
    }
}
