<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $applications = Application::all();

        return view('admin.index', ['applications' => $applications]);
    }

    public function update(Request $request, Application $application)
    {
        $application->update(['status' => StatusEnum::from($request->status)]);
        return redirect()->back()->with('success', "Статус заявки обновлен");
    }
}
