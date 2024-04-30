<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;


class ProfileInformationController extends Controller
{
    /**
     * Display the user's profile information page.
     */
    public function edit(Request $request): View
    {
        return view('profile.information.edit', [
            'user' => $request->user(),
        ]);
    }
}
