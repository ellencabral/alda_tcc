<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/users');
});

Route::resource('/users', UserController::class)
    ->except(['show']);
