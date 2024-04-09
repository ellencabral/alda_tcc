<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // EDITAR PERFIL DO USUARIO
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRIAR LOJA
    Route::get('/shop/create', [ShopController::class, 'create'])->name('shop.create');

    // CONFIGURAR LOJA
    Route::post('/shop', [ShopController::class, 'store'])->name('shop.store');
    Route::get('/shop/edit', [ShopController::class, 'edit'])->name('shop.edit');
    Route::patch('/shop', [ShopController::class, 'update'])->name('shop.update');

    // GERENCIAR PRODUTOS
    Route::get('/shop/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/shop/products/{product}', [ProductController::class, 'show'])->name('products.show');
});

require __DIR__.'/auth.php';

Route::resource('/users', UserController::class)
    ->except(['show']);
