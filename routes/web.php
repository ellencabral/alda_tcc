<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

// ADMIN
Route::middleware(['auth', 'role:admin'])
    ->name('admin.') //admin.users.edit
    ->prefix('admin')
    ->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
});

// USUARIO COMUM
Route::middleware(['auth', 'role:user'])->group(function () {
    // CRIAR LOJA
    Route::get('/shop', [ShopController::class, 'create'])->name('shop.create');
    Route::post('/shop', [ShopController::class, 'store'])->name('shop.store');
});

Route::middleware(['auth', 'verified'])->group(function () {
    // EDITAR PERFIL DO USUARIO
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/search', [ProductController::class, 'search'])->name('search');

    Route::get('/shop/{url}', [ShopController::class, 'show'])->name('shop.show');
    Route::get('/shop/{url}/{description}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/shopping_cart', [ShoppingCartController::class, 'index'])->name('shopping_cart.index');
    Route::post('/shopping_cart', [ShoppingCartController::class, 'addShoppingCart'])->name('shopping_cart.add');
});

// ARTESAO
Route::middleware(['auth', 'role:artisan'])
    ->name('artisan.') //artisan.shop.edit
    ->prefix('artisan')
    ->group(function () {
    Route::get('/', [ShopController::class, 'index'])->name('shop.index');

    // CONFIGURAR LOJA
    Route::get('/shop', [ShopController::class, 'edit'])->name('shop.edit');
    Route::patch('/shop', [ShopController::class, 'update'])->name('shop.update');
    Route::delete('/shop', [ShopController::class, 'destroy'])->name('shop.destroy');

    // GERENCIAR PRODUTOS
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/{product}/edit', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

});

require __DIR__.'/auth.php';


