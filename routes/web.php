<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth', 'role:admin'])->group(function () {
//    Route::get('/admin', function () {
//        return view('admin.index');
//    })->name('admin.index');
//   Route::prefix('admin')->group(function () {
//      Route::resource('/users', UserController::class)->except(['show']);
//   });
//});

Route::middleware(['auth', 'role:admin'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'role:user'])->group(function () {
    // CRIAR LOJA
    Route::get('/shop', [ShopController::class, 'create'])->name('shop.create');
    Route::post('/shop', [ShopController::class, 'store'])->name('shop.store');
});

Route::middleware('auth')->group(function () {
    // EDITAR PERFIL DO USUARIO
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    // CONFIGURAR LOJA
    Route::get('/shop', [ShopController::class, 'edit'])->name('shop.edit');
    Route::patch('/shop', [ShopController::class, 'update'])->name('shop.update');
    Route::delete('/shop', [ShopController::class, 'destroy'])->name('shop.destroy');

    // GERENCIAR PRODUTOS
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{product}/details', [ProductController::class, 'show'])->name('products.show');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/{product}/editd', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}/delete', [ProductController::class, 'destroy'])->name('products.destroy');

});

require __DIR__.'/auth.php';


