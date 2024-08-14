<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Product;
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
    $trail->push('Minha Conta', route('profile.edit'));
});

Breadcrumbs::for('profile.information.edit', function ($trail) {
    $trail->parent('profile');
    $trail->push('Dados Pessoais', route('profile.information.edit'));
});

Breadcrumbs::for('profile.password.edit', function ($trail) {
    $trail->parent('profile');
    $trail->push('Editar Senha', route('profile.password.edit'));
});


Breadcrumbs::for('shipping-address.index', function ($trail) {
    $trail->parent('profile');
    $trail->push('Endereços', route('profile.shipping-address.index'));
});

Breadcrumbs::for('shipping-address.create', function ($trail) {
    $trail->parent('shipping-address.index');
    $trail->push('Adicionar Endereço', route('profile.shipping-address.create'));
});

Breadcrumbs::for('shipping-address.edit', function ($trail, $address) {
    $trail->parent('shipping-address.index');
    $trail->push('Editar Endereço', route('profile.shipping-address.edit', $address));
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

Breadcrumbs::for('shops.index', function ($trail) {
    $trail->push("Lojas", route('search-results', ['search_type' => 'Lojas', 'search_text' => ' ']));
});

Breadcrumbs::for('shops.show', function ($trail, Shop $shop) {
    $trail->parent('shops.index');
    $trail->push($shop->name, route('shops.show', $shop->url));
});

Breadcrumbs::for('categories.index', function ($trail) {
    $trail->push('Categorias de Artesanato', route('categories.index'));
});

Breadcrumbs::for('categories.products.index', function ($trail, $category) {
    $trail->parent('categories.index');
    $trail->push($category->description, route('categories.products.index', $category));
});

Breadcrumbs::for('products.show', function ($trail, $shop, $product) {
    $trail->parent('shops.show', $shop);
    $trail->push($product->name, route('products.show', $product));
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

Breadcrumbs::for('artisan.index', function($trail) {
    $trail->push('Painel de Controle', route('artisan.index'));
});

Breadcrumbs::for('shops.edit', function($trail) {
    $trail->parent('artisan.index');
    $trail->push("Configurações", route('artisan.shops.edit'));
});

Breadcrumbs::for('shops.information.edit', function($trail) {
    $trail->parent('shops.edit');
    $trail->push("Informações", route('artisan.shops.information.edit'));
});

Breadcrumbs::for('shops.customization.edit', function($trail) {
    $trail->parent('shops.edit');
    $trail->push("Personalização", route('artisan.shops.customization.edit'));
});

Breadcrumbs::for('shops.address.create', function($trail) {
    $trail->parent('shops.edit');
    $trail->push("Endereço", route('artisan.shops.address.edit'));
});

Breadcrumbs::for('shops.address.edit', function($trail) {
    $trail->parent('shops.edit');
    $trail->push("Endereço", route('artisan.shops.address.edit'));
});

Breadcrumbs::for('shops.commissions.index', function ($trail) {
    $trail->parent('artisan.index');
    $trail->push('Encomendas da Loja', route('artisan.commissions.index'));
});

Breadcrumbs::for('shops.commissions.show', function ($trail, $commission) {
    $trail->parent('shops.commissions.index');
    $trail->push('Detalhes da Encomenda', route('artisan.commissions.show', $commission));
});

Breadcrumbs::for('products', function($trail) {
    $trail->parent('artisan.index');
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
