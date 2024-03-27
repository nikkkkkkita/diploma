<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::prefix('shop')->group(function () {
            Route::post('', [\App\Http\Controllers\user\ShopController::class, 'store'])->name('user.shop.store');
        });
    });
});
