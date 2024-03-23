<?php

use App\Http\Controllers\CommissionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/commissions');
});

Route::resource('/commissions', CommissionsController::class)
    ->only(['index', 'show']);
