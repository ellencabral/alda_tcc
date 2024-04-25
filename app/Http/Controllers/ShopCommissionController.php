<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionProduct;
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

        return view('shop.commissions.index', [
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

                    $url = view('shop.commissions.show', [
                        'commission' => $commission,
                        'commissionProducts' => $commissionProducts,
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

    public function update(Request $request): RedirectResponse
    {
        return redirect(route('shop.commissions.show'));
    }
}