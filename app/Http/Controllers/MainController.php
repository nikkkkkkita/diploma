<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('main', compact('products'));
    }
}
