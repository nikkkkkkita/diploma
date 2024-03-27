<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $application = $user->application;
        $shop = $user->shop;
        return view('user.index', ['application' => $application, 'shop' => $shop]);
    }
}
