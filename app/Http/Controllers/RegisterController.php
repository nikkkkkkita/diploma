<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        User::create([
            "password" => bcrypt($request->password)
        ] + $request->all());

        return redirect()->route('login');
    }
}
