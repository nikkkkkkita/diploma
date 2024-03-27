<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopOrderUpdateRequest;
use App\Http\Requests\UserShopStoreRequest;
use App\Http\Resources\UserOrderResource;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shop;
use App\Models\SocialLink;
use App\Models\SocialType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $shop = $user->shop;
        return view('user.shop.create', ['shop' => $shop]);
    }

    public function store(UserShopStoreRequest $request)
    {
        $user = Auth::user();
        $isExistShop = $user->shop;
        if ($isExistShop)
            return redirect()->back()->with('error', 'Магазин уже создан');
        $dataShop = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        if ($request->avatar) {
            $avatarFileName = $request->file('avatar')->store('/avatars', 'public');
            $dataShop += ['avatar' => $avatarFileName];
        }
        if ($request->header) {
            $headerFileName = $request->file('header')->store('/headers', 'public');
            $dataShop += ['header' => $headerFileName];
        }
        $shop = $user->shop()->create($dataShop);
        $socialLinks = $request->social_links;
        foreach ($socialLinks as $link) {
            $shop->socialLinks()->create($link);
        }

        return redirect()->route('user.account');
    }

    public function edit(Request $request)
    {
        $user = $request->user();
        $shop = $user->shop;
        $socialTypes = SocialType::all();
        return view('user.shop.edit', ['shop' => $shop, 'socialTypes' => $socialTypes]);
    }

    public function update(Request $request, Shop $shop)
    {
        $dataShop = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        if ($request->avatar) {
            $avatarFileName = $request->file('avatar')->store('/avatars', 'public');
            $dataShop += ['avatar' => $avatarFileName];
        }
        if ($request->header) {
            $headerFileName = $request->file('header')->store('/headers', 'public');
            $dataShop += ['header' => $headerFileName];
        }
        $shop->update($dataShop);
        $socialLinks = $request->social_links;
        if ($socialLinks) {
            foreach ($socialLinks as $index => $linkData) {
                $link = $shop->socialLinks->get($index);
                if ($link) {
                    $link->update($linkData);
                } else {
                    $shop->socialLinks()->create($linkData);
                }
            }
        }
        return redirect()->route('user.account')->with('message', 'Товар изменен');
    }

    public function deleteSocial(string $id, Request $request)
    {
        $link = SocialLink::findOrFail($id);
        $link->delete();
        return response()->json(['message' => 'Успех']);
    }

    public function getOrders()
    {
        $user = auth()->user();
//        foreach ($user->shop->products as $product) {
//            if ($product->orders()->count() > 0) {
//                $orders[] = $product->orders;
//            }
//        }
//
//        $orders = collect($orders)->flatten();
        //todo тут ебануть надо правильно
        $shop = $user->shop;
        $productIds = $shop->products()->pluck('id')->toArray();
        $orders = DB::table('order_products')
            ->whereIn('product_id', $productIds)
            ->get();
        dd($orders);
        return view('user.shop.order.index', ['orders' => UserOrderResource::collection($orders), 'shop' => $shop]);
    }

    public function updateOrder(string $id, ShopOrderUpdateRequest $request)
    {
        // ->products->order
        $user = auth()->user();
        $shop = $user->shop;
        $orderProduct = DB::table('order_products')->where('id', $id)->first();
        $product = Product::where('id', $orderProduct->product_id)->where('shop_id', $shop->id)->first();
        if (!$product) {
            return redirect()->back()->with('error', 'Вы не владеете данным товаром');
        }
        DB::table('order_products')->where('id', $id)->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Успех');
    }
}
