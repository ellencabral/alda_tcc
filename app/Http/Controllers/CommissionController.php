<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CommissionController extends Controller
{
    public function summary(): View
    {
        return view('commission.summary');
    }
}
