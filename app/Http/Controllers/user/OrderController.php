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
        return view('user.order.index', ['orders' => UserOrderResource::collection($orders), 'shop' => $shop]);
    }
}
