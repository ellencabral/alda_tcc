<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\ShippingAddress;
use App\Models\Shop;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function ($trail) {
   $trail->push('Início', route('home'));
});

Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('home');
    $trail->push('Meu Perfil', route('profile.edit'));
});

Breadcrumbs::for('shipping-address.edit', function ($trail, $address) {
    $trail->parent('profile');
    $trail->push('Editar Endereço', route('profile.shipping-address.edit', $address));
});

Breadcrumbs::for('shop.activate', function($trail, $shop) {
    $trail->parent('home');
    $trail->push('Ativar Loja', route('shop.activate-form', $shop));
});

Breadcrumbs::for('cart', function ($trail) {
    $trail->parent('home');
    $trail->push('Sacola de Compras', route('cart'));
});

Breadcrumbs::for('checkout', function ($trail) {
    $trail->parent('cart');
    $trail->push('Finalizar Encomenda', route('checkout.index'));
});

Breadcrumbs::for('commissions.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Minhas Encomendas', route('commissions.index'));
});

Breadcrumbs::for('commissions.show', function ($trail, $commission) {
    $trail->parent('commissions.index');
    $trail->push('Detalhes da Encomenda', route('commissions.show', $commission));
});

Breadcrumbs::for('shop.show', function ($trail, Shop $shop) {
    $trail->push("Página da Loja '" . $shop->name . "'", route('shop.show', $shop->url));
});

Breadcrumbs::for('products.show', function ($trail, Shop $shop, $product) {
    $trail->parent('shop.show', $shop);
    $trail->push($product, route('products.show', ['url' => $shop->url, 'name' => $product]));
});

// Admin

Breadcrumbs::for('admin', function (BreadcrumbTrail $trail) {
    $trail->push('Painel de Controle do Admin', route('admin.index'));
});

Breadcrumbs::for('users', function($trail) {
   $trail->parent('admin');
   $trail->push('Usuários', route('admin.users.index'));
});

Breadcrumbs::for('users.create', function($trail) {
   $trail->parent('users');
   $trail->push('Novo Usuário', route('admin.users.create'));
});

Breadcrumbs::for('users.edit', function($trail, $user) {
   $trail->parent('users');
   $trail->push("Editar Usuário '" . $user . "'", route('admin.users.edit', $user));
});

Breadcrumbs::for('permissions', function($trail) {
    $trail->parent('admin');
    $trail->push('Permissões', route('admin.permissions.index'));
});

Breadcrumbs::for('permissions.create', function($trail) {
    $trail->parent('permissions');
    $trail->push('Criar Permissão', route('admin.permissions.create'));
});

// Artesão

Breadcrumbs::for('shop.dashboard', function($trail) {
    $trail->push('Painel de Controle do Artesão', route('artisan.shop.dashboard'));
});

Breadcrumbs::for('shop.commissions.index', function ($trail) {
    $trail->parent('shop.dashboard');
    $trail->push('Encomendas da Loja', route('artisan.commissions.index'));
});

Breadcrumbs::for('shop.commissions.show', function ($trail, $commission) {
    $trail->parent('shop.commissions.index');
    $trail->push('Detalhes da Encomenda', route('artisan.commissions.show', $commission));
});

Breadcrumbs::for('products', function($trail) {
    $trail->parent('shop.dashboard');
    $trail->push('Produtos da Loja', route('artisan.products.index'));
});

Breadcrumbs::for('products.create', function($trail) {
    $trail->parent('products');
    $trail->push('Adicionar Produto', route('artisan.products.create'));
});

Breadcrumbs::for('products.edit', function($trail, $product) {
    $trail->parent('products');
    $trail->push("Editar Produto '" . $product . "'", route('artisan.products.edit', $product));
});

Breadcrumbs::for('shop.edit', function($trail, $shop) {
    $trail->parent('shop.dashboard');
    $trail->push("Configurações da Loja '" . $shop . "'", route('artisan.shop.edit', $shop));
});

Breadcrumbs::for('shop.address.edit', function($trail, $shop) {
    $trail->parent('shop.edit', $shop);
    $trail->push("Editar Endereço", route('artisan.shop.address.edit'));
});
