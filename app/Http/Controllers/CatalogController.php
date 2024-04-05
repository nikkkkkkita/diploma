<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Livewire\CatalogPagination;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        return view('catalog');
    }
}
