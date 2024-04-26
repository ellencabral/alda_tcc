<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\CommissionProduct;
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

    public function show(Commission $commission, Request $request)
    {
        $userCommissions = Commission::where('user_id', $request->user()->id)->get();

        if($userCommissions->isNotEmpty()) {
            foreach($userCommissions as $slug) {
                if($slug->id == $commission->id) {
                    $commissionProducts = CommissionProduct::where('commission_id', $commission->id)->get();

                    $url = view('commissions.show', [
                        'commission' => $commission,
                        'commissionProducts' => $commissionProducts,
                    ]);
                    break;
                }
                $url = redirect(route('commissions.index'));
            }
        } else {
            $url = redirect(route('commissions.index'));
        }

        return $url;
    }

    public function destroy(Commission $commission, Request $request): RedirectResponse
    {
        $request->validateWithBag('commissionDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $commission->delete();

        return redirect(route('commissions.index'))->with('status', 'commission-destroyed');
    }
}
