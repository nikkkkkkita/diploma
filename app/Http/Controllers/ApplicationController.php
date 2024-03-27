<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApplicationRequest;
use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $application = $user->application;
        $shop = $user->shop;
        return view('user.application', ['application' => $application, 'shop' => $shop]);
    }

    public function create()
    {
        return view('user.application.create');
    }

    public function store(ApplicationRequest $request, User $user)
    {
        $user->application()->create($request->all());
        return redirect()->route('user.application.index')->with('message', "Заявка отправлена");
    }
}
