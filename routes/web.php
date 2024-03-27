<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('home');

Route::get('register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::get('login', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
Route::post('register', [\App\Http\Controllers\RegisterController::class, 'register'])->name('registration');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'auth'])->name('auth');
Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('account', [\App\Http\Controllers\user\UserController::class, 'index'])->name('user.account');
        Route::get('account/application', [\App\Http\Controllers\ApplicationController::class, 'index'])->name('user.application.index');
        Route::get('account/application/create', [\App\Http\Controllers\ApplicationController::class, 'create'])->name('user.application.create');
        Route::post('account/application/create/{user}', [\App\Http\Controllers\ApplicationController::class, 'store'])->name('user.application.store');

        Route::prefix('shop')->group(function () {
            Route::get('/create', [\App\Http\Controllers\user\ShopController::class, 'create'])->name('user.shop.create');
            Route::get('/edit', [\App\Http\Controllers\user\ShopController::class, 'edit'])->name('user.shop.edit');
            Route::put('/{shop}', [\App\Http\Controllers\user\ShopController::class, 'update'])->name('user.shop.update');
            Route::delete('/social/{id}', [\App\Http\Controllers\user\ShopController::class, 'deleteSocial'])->name('user.shop.delete.social');
        });

        Route::prefix('product')->group(function () {
            Route::get('', [\App\Http\Controllers\user\ProductController::class, 'index'])->name('user.product');
            Route::get('/create', [\App\Http\Controllers\user\ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [\App\Http\Controllers\user\ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [\App\Http\Controllers\user\ProductController::class, 'edit'])->name('product.edit');
            Route::patch('/{product}', [\App\Http\Controllers\user\ProductController::class, 'update'])->name('product.update');
            Route::delete('/{id}', [\App\Http\Controllers\user\ProductController::class, 'destroy'])->name('product.delete');
            Route::delete('/media/{id}', [\App\Http\Controllers\user\ProductController::class, 'deleteImage'])->name('product.media.delete');
        });

        Route::get('orders', [\App\Http\Controllers\user\OrderController::class, 'index'])->name('user.orders.index');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/application', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.application.index');
    Route::put('admin/application/create/{application}', [\App\Http\Controllers\AdminController::class, 'update'])->name('admin.application.update');
});


Route::prefix('shop')->group(function () {
    Route::prefix('/orders')->group(function () {
        Route::get('', [\App\Http\Controllers\user\ShopController::class, 'getOrders'])->name('shop.orders');
        Route::patch('/{id}', [\App\Http\Controllers\user\ShopController::class, 'updateOrder'])->name('shop.orders.update');
    });
    Route::get('/{shop}', [\App\Http\Controllers\ShopController::class, 'show'])->name('shop.show');
    Route::get('', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');

});

Route::prefix('product')->group(function () {
    Route::get('/{product}', [\App\Http\Controllers\ProductController::class, 'show'])->name('product.show');
    Route::get('/cart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('addProductToCart');
});

Route::prefix('cart')->group(function () {
    Route::get('', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/{id}', [\App\Http\Controllers\CartController::class, 'deleteItem'])->name('cart.delete');
    Route::post('/update-cart', [\App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::get('/get/{id}', [\App\Http\Controllers\CartController::class, 'getCart']);
    Route::post('/operation/{id}', [\App\Http\Controllers\CartController::class, 'operationCart']);
});
Route::post('/buy', [\App\Http\Controllers\CartController::class, 'buy'])->name('cart.buy');

