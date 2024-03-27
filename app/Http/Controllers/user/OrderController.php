<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserOrderResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
////        $application = $user->application;
//        $shop = $user->shop;
//        $products = $user->shop?->products;
//        $orders = $user->orders;
////        $groupedProducts = $products->groupBy('id');
//        $groupedProducts = $orders->groupBy('product_id');
//        $uniqueProducts = $groupedProducts->map(function ($group) {
//            return $group->first();
//        });
        $shop = $user->shop;
        $products = $user->shop?->products;
        $orders = $user->orders;
        $cartData = [];
        foreach ($orders as $order) {
            $products = $order->products()->withPivot('quantity', 'price')->get();
            $productsData = [];
            foreach ($products as $product) {
                $productsData[] = array_merge($product->toArray(), [
                    'shop' => $product->shop
                ]);
            }
            $cartData[] = [
                'id' => $order->id,
                'total' => $order->total,
                'city' => $order->city,
                'street' => $order->street,
                'home' => $order->home,
                'flat' => $order->flat,
                'index' => $order->index,
                'products' => $productsData,
                'contact_information' => $order->contactInformation
            ];
        }
        //['shop' => $shop, 'products' => $products, 'orders' => $cartData]

        return view('user.order.index', ['orders' => UserOrderResource::collection($orders), 'shop' => $shop]);
//        return view('user.order.index', ['shop' => $shop, 'products' => $products, 'orders' => $orders, 'uniqueProducts' => $uniqueProducts, 'groupedProducts' => $groupedProducts]);
    }
}
