<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\ShoppingBagController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

//Route::get('/', \App\Livewire\InputsAddress::class)->name('search-postal-code');

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

    // EDITAR ENDEREÇO
    Route::get('/profile/shipping-address/{id}/edit', [ShippingAddressController::class, 'edit'])->name('profile.shipping-address.edit');
    Route::patch('/profile/shipping-address/{id}', [ShippingAddressController::class, 'update'])->name('shipping-address.update');
    Route::post('/profile/shipping-address', [ShippingAddressController::class, 'store'])->name('shipping-address.store');
    Route::delete('/profile/shipping-address/{id}', [ShippingAddressController::class, 'destroy'])->name('shipping-address.destroy');

    Route::get('/search', [ProductController::class, 'search'])->name('search');

    // ENCOMENDAS
    Route::get('/commissions/checkout', [CommissionController::class, 'checkout'])->name('commissions.checkout');
    Route::get('/commissions/shipping', [CommissionController::class, 'shipping'])->name('commissions.shipping');
    Route::post('/commissions', [CommissionController::class, 'store'])->name('commissions.store');
});

//Route::get('/payment', [PaymentController::class, 'index'])->name('payment');
//Route::get('/app', [PaymentController::class, 'app'])->name('app');

Route::get('/shopping-bag', [ShoppingBagController::class, 'index'])->name('shopping-bag');
Route::post('/shopping-bag/add', [ShoppingBagController::class, 'add'])->name('shopping-bag.add');
Route::delete('/shopping-bag/remove/{id}', [ShoppingBagController::class, 'delete'])->name('shopping-bag.remove');
Route::patch('/shopping-bag/edit/{id}', [ShoppingBagController::class, 'update'])->name('shopping-bag.edit');
Route::get('/shopping-bag/destroy', [ShoppingBagController::class, 'destroy'])->name('shopping-bag.destroy');


Route::get('/shop/{url}', [ShopController::class, 'show'])->name('shop.show');
Route::get('/shop/{url}/{name}', [ProductController::class, 'show'])->name('products.show');

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

    Route::patch('/shop/address', [ShopController::class, 'updateAddress'])->name('shop.address.update');
    Route::get('/shop/address/edit', [ShopController::class, 'editAddress'])->name('shop.address.edit');
    Route::patch('/shop/address/remove', [ShopController::class, 'removeAddress'])->name('shop.address.remove');

    // GERENCIAR PRODUTOS
    Route::resource('/products', ProductController::class);
});

require __DIR__.'/auth.php';


