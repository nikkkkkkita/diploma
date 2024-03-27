<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only(['login', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === "user") {
                return redirect()->route('home');
            }
            if ($user->role === "admin") {
                return redirect()->route('home');
            }
        }
        return redirect()->back()->with('error', 'Пользователь не найден');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('home');
    }
}
