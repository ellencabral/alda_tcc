<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionsController extends Controller
{
    public function index()
    {
        $commissions = Commission::with(['products'])->get();

        return view('commissions.index')->with('commissions', $commissions);
    }
}
