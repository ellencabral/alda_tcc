<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopCommissionController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

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
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // EDITAR PERFIL DO USUARIO
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // EDITAR ENDEREÇO
    Route::get('/profile/shipping-address/{id}/edit', [ShippingAddressController::class, 'edit'])->name('profile.shipping-address.edit');
    Route::patch('/profile/shipping-address/{id}', [ShippingAddressController::class, 'update'])->name('shipping-address.update');
    Route::post('/profile/shipping-address', [ShippingAddressController::class, 'store'])->name('shipping-address.store');
    Route::delete('/profile/shipping-address/{id}', [ShippingAddressController::class, 'destroy'])->name('shipping-address.destroy');

    // PESQUISAR PRODUTOS
    Route::get('/search', [ProductController::class, 'search'])->name('search');

    // CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // ENCOMENDAS REALIZADAS
    Route::resource('/commissions', CommissionController::class)
        ->only(['index', 'show', 'update', 'destroy']);
});

// DESLOGADO

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartController::class, 'delete'])->name('cart.remove');
Route::patch('/cart/edit/{id}', [CartController::class, 'update'])->name('cart.edit');
Route::get('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/shop/{url}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/shop/{url}/{name}', [ProductController::class, 'show'])->name('products.show');

// ARTESAO
Route::middleware(['auth', 'role:artisan'])
    ->name('artisan.') //artisan.shop.edit
    ->prefix('artisan')
    ->group(function () {

    Route::get('/', [ShopController::class, 'dashboard'])->name('shop.dashboard');

    // CONFIGURAR LOJA
    Route::get('/shop', [ShopController::class, 'edit'])->name('shop.edit');
    Route::patch('/shop', [ShopController::class, 'update'])->name('shop.update');
    Route::delete('/shop', [ShopController::class, 'destroy'])->name('shop.destroy');

    Route::patch('/shop/address', [ShopController::class, 'updateAddress'])->name('shop.address.update');
    Route::get('/shop/address/edit', [ShopController::class, 'editAddress'])->name('shop.address.edit');
    Route::patch('/shop/address/remove', [ShopController::class, 'removeAddress'])->name('shop.address.remove');

    // GERENCIAR ENCOMENDAS
    Route::resource('/commissions', ShopCommissionController::class)
        ->only(['index', 'show', 'update']);

    // GERENCIAR PRODUTOS
    Route::resource('/products', ProductController::class);
});

require __DIR__.'/auth.php';


