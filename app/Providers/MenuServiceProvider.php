<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        View::composer('includes.user_menu', function ($view) {
            $user = Auth::user();
            $application = $user->application;
            $shop = $user->shop;
            $products = $user->shop?->products;
            $orders = $user->orders;

            $view->with('application', $application, 'shop',$shop, 'products',$products,'orders', $orders);
        });

    }
}
