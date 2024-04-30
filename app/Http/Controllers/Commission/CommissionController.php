<?php

namespace App\Http\Controllers\Commission;

use App\Http\Controllers\Controller;
use App\Models\Commission;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommissionController extends Controller
{
    public function index(Request $request): View
    {
        $commissions = $request->user()->commissions()
            ->orderBy('created_at', 'desc')
            ->get();

        return view('commissions.index', [
            'commissions' => $commissions,
        ]);
    }

    public function show(Commission $commission, Request $request)
    {
        $userCommission = $request->user()->commissions()->where('id', $commission->id)->first();

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
