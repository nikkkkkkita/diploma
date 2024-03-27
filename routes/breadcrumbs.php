<?php
use \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('catalog', function ($trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog'));
});
// товар в каталоге
Breadcrumbs::for('product', function ($trail) {
    $trail->parent('catalog');
    $trail->push('...', route('product'));
});

Breadcrumbs::for('user.product', function ($trail) {
    $trail->push('Товары', route('user.product'));
});

Breadcrumbs::for('user.account', function ($trail) {
    $trail->push('Личный кабинет', route('user.account'));
});

Breadcrumbs::for('product.edit', function ($trail, $id) {
    $trail->parent('user.product');
    $product = \App\Models\Product::find($id);
    $trail->push($product->name, route('product.edit', $id));
});

Breadcrumbs::for('user.shop.edit', function ($trail, $id) {
    $trail->parent('user.account');
    $shop = \App\Models\Shop::find($id);
    $trail->push($shop->name, route('user.shop.edit', $id));
});
