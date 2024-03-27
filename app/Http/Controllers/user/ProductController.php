<?php

namespace App\Http\Controllers\user;

use App\Enums\CandleComposition;
use App\Enums\CandleType;
use App\Enums\Color;
use App\Enums\Country;
use App\Enums\DiffuserPlacement;
use App\Enums\DiffusserType;
use App\Enums\FlavoringType;
use App\Enums\WickType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\CategoryType;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $application = $user->application;
        $shop = $user->shop;
        $products = $user->shop->products;
        return view('user.product.product', ['application' => $application, 'shop' => $shop, 'products' => $products]);
    }

    public function create()
    {
        $user = Auth::user();
        $application = $user->application;
        $shop = $user->shop;
        $products = $user->shop->products;
        $categories = CategoryType::all();
        $compositions = CandleComposition::toArray();
        $wTypes = WickType::toArray();
        $diffuserTypes = DiffusserType::toArray();
        $diffuserPlacements = DiffuserPlacement::toArray();
        $flavoringTypes = FlavoringType::toArray();
        $mCountries = Country::toArray();
        $colorNames = Color::toArray();
        $types = CandleType::toArray();

        return view('user.product.create', ['application' => $application, 'shop' => $shop, 'products' => $products, 'categories' => $categories, 'types' => $types, 'compositions' => $compositions, 'wickTypes' => $wTypes, 'diffuserTypes' => $diffuserTypes, 'diffuserPlacements' => $diffuserPlacements, 'flavoringTypes' => $flavoringTypes, 'mCountries' => $mCountries, 'colorNames' => $colorNames]);
    }

    public function store(ProductRequest $request) //Заменить на продукт реквест
    {
        //ProductRequest, там все поля, для продукта и характеристик
        $user = Auth::user();
        $dataProduct = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'count' => $request->count,
            'category_id' => $request->category_id,
        ];

            $dataCharacteristics = [
                'country_of_manufacture' => $request->country_of_manufacture,
                'compound' => $request->compound,
                'material' => $request->material,
                'height' => $request->height,
                'volume' => $request->volume,
                'aroma' => $request->aroma,
                'burning_time' => $request->burning_time,
                'wick_type' => $request->wick_type,
                'type' => $request->type,
                'weight' => $request->weight,
                'color' => $request->color,
                'type_diffuser' => $request->type_diffuser,
                'type_of_flavoring' => $request->type_of_flavoring,
                'diffuser_placement' => $request->diffuser_placement,
            ];


        $product = $user->shop->products()->create($dataProduct);
        $product->characteristics()->create($dataCharacteristics);
        if ($request->image) {
            foreach ($request->file('image') as $image) {
                $product->addMedia($image)->toMediaCollection('products');
            }
        }

        return redirect()->route('user.product')->with('message', 'Товар создан');

    }

    public function edit(string $id)
    {
        $product = Product::find($id);
        $user = Auth::user();
        $application = $user->application;
        $shop = $user->shop;
        $products = $user->shop->products;
        $categories = CategoryType::all();
        $compositions = CandleComposition::toArray();
        $wTypes = WickType::toArray();
        $diffuserTypes = DiffusserType::toArray();
        $diffuserPlacements = DiffuserPlacement::toArray();
        $flavoringTypes = FlavoringType::toArray();
        $mCountries = Country::toArray();
        $colorNames = Color::toArray();
        $types = CandleType::toArray();
        if (!$product) {
            return redirect()->back()->with('error', "Товар не найден");
        }

        return view('user.product.edit', ['application' => $application, 'shop' => $shop, 'products' => $products, 'product' => $product, 'categories' => $categories, 'types' => $types, 'compositions' => $compositions, 'wickTypes' => $wTypes, 'diffuserTypes' => $diffuserTypes, 'diffuserPlacements' => $diffuserPlacements, 'flavoringTypes' => $flavoringTypes, 'mCountries' => $mCountries, 'colorNames' => $colorNames]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $dataProduct = $request->only(['name', 'description', 'price', 'category_id', 'count']);
        $dataCharacteristics = $request->only(['country_of_manufacture', 'compound', 'material', 'height', 'volume', 'aroma', 'burning_time', 'wick_type', 'type', 'weight', 'color']);

        if ($request->image) {
            foreach ($request->image as $image) {
                $product->addMedia($image)->toMediaCollection('products');
            }
        }

        $product->update($dataProduct);
        $product->characteristics()->update($dataCharacteristics);
        return redirect()->route('user.product')->with('message', 'Товар изменен');
    }

    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Товар не найден');
        }

        $product->delete();

        return redirect()->back()->with('success', 'Товар успешно удален');
    }

    public function deleteImage(string $id)
    {
        $media = Media::find($id);
        $media->delete();
        return response()->json([
            'message' => 'yeah'
        ]);
    }
}
