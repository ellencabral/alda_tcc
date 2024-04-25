<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionProduct;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommissionController extends Controller
{
    public function index(Request $request): View
    {
        $commissions = Commission::where('user_id', $request->user()->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('commissions.index', [
            'commissions' => $commissions,
        ]);
    }

    public function show(Request $request): View
    {
        $commission = Commission::where('id', $request->commission)->first();

        $commissionProducts = CommissionProduct::where('commission_id', $commission->id)->get();

        return view('commissions.show', [
            'commission' => $commission,
            'commissionProducts' => $commissionProducts,
        ]);
    }

    public function shopCommissions(Request $request): View
    {
        $commissions = Commission::where('shop_id', $request->user()->shop->id)->get();

        return view('shop.commissions.index', [
            'commissions' => $commissions,
        ]);

    }
}
