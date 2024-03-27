<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\SocialType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop.index', ['shops' => $shops]);
    }

    public function show(Shop $shop): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $products = $shop->products;
        $links = $shop->socialLinks;
        $linksData = [];
        foreach ($links as $link) {
            $linksData[] = [
                'link' => $link->link,
                'name' => SocialType::find($link->social_type_id)->name
            ];
        }
        return view('shop.show', ['shop' => $shop, 'links' => $linksData, 'products' => $products]);
    }
}
