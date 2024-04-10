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
        $shop = $user->shop;
        $orders = $user->orders;
        $data = [];
        foreach ($orders as $key => $order) {
            $data[$key]['order'] = $order;
            $data[$key]['products'] = $order->products()->get();
        }
        return view('user.order.index', ['data' => $data, 'shop' => $shop]);
    }
}
