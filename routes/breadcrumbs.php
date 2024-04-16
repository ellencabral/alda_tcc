<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Shop;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function ($trail) {
   $trail->push('Principal', route('home'));
});

Breadcrumbs::for('profile', function ($trail) {
    $trail->parent('home');
    $trail->push('Perfil', route('profile.edit'));
});

Breadcrumbs::for('shop.create', function ($trail) {
    $trail->parent('home');
    $trail->push('Criar Loja', route('shop.create'));
});

Breadcrumbs::for('shopping-bag', function ($trail) {
    $trail->parent('home');
    $trail->push('Sacola de Compras', route('shopping-bag'));
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

Breadcrumbs::for('artisan', function($trail) {
    $trail->push('Painel de Controle do Artesão', route('artisan.shop.index'));
});

Breadcrumbs::for('products', function($trail) {
    $trail->parent('artisan');
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
    $trail->parent('artisan');
    $trail->push("Configurações da Loja '" . $shop . "'", route('artisan.shop.edit', $shop));
});
//
//// Home > Blog
//Breadcrumbs::for('blog', function (BreadcrumbTrail $trail) {
//    $trail->parent('home');
//    $trail->push('Blog', route('blog'));
//});
//
//// Home > Blog > [Category]
//Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//    $trail->parent('blog');
//    $trail->push($category->title, route('category', $category));
//});
