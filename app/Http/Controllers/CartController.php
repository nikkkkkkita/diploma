<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInformationRequest;
use App\Models\ContactInformation;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function getCart(Request $request, string $id): JsonResponse
    {
        $cart = $request->session()->get('cart');
        return response()->json($cart[$id]);
    }

    public function operationCart(Request $request, string $id): JsonResponse
    {
        $cart = $request->session()->get('cart');
        $operation = $request->operation;
        if (isset($cart[$id])) {
            // Увеличиваем количество товара на 1
            if ($operation === 'plus')
                $cart[$id]['quantity']++;
            elseif ($operation === 'min')
                $cart[$id]['quantity']--;
            else
                return response()->json(['message' => ''], 400);
            // Сохраняем обновленную корзину в сессию
            $request->session()->put('cart', $cart);

            // Возвращаем обновленную корзину или что-то еще в зависимости от ваших требований
            return response()->json(['message' => 'Quantity updated successfully', 'cart' => $cart]);
        } else {
            // В случае, если элемент с указанным $id не найден в корзине, можно выполнить какую-то другую логику или вернуть сообщение об ошибке
            return response()->json(['error' => 'Product not found in cart'], 404);
        }
    }

    public function addToCart(string $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->getFirstMediaUrl('products'),
                'count' => $product->count,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Товар успешно добавлен');
    }

    public function update(Request $request)
    {
//        $productId = $request->input('product_id');
//        $quantity = $request->input('quantity');
//
//        if ($productId && $quantity) {
//            $cart = session()->get('cart', []);
//
//            if (isset($cart[$productId])) {
//                $cart[$productId]["quantity"] = $quantity;
//                session()->put('cart', $cart);
//            }
//        }
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'ПИЗДА');
        }

    }

    public function deleteItem(string $itemId)
    {
//        $cart = session()->get('cart', []);
//        if ($cart !== []) {
//            foreach ($cart as $id => $item) {
//                session()->forget('cart');
//            }
//        }
//        return redirect()->back();
        // Получаем текущее состояние корзины из сессии
        $cart = session()->get('cart', []);
        // Проверяем, существует ли элемент с указанным $itemId в корзине
        if (isset($cart[$itemId])) {
            // Если элемент существует, удаляем его из корзины
            unset($cart[$itemId]);
            // Обновляем состояние корзины в сессии
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }

//    public function deleteAll()
//    {
//        $cart = session()->get('cart', []);
//        if ($cart !== []) {
//            foreach ($cart as $id => $item) {
//                unset($cart[$id]);
//                session()->put('cart', $cart);
//            }
//        }
//    }

    public function buy(ContactInformationRequest $request)
    {
        $user = auth()->user();
//        ContactInformation::create($request->all());

//        $dataContact = [
//            'firstName' => $request->firstName,
//            'lastName' => $request->lastName,
//            'middleName' => $request->middleName,
//            'phone' => $request->phone,
//            'email' => $request->email,
//            'city' => $request->city,
//            'street' => $request->street,
//            'home' => $request->home,
//            'flat' => $request->flat,
//            'index' => $request->index,
//            'comment' => $request->comment,
//        ];
//        $dataContact = $request->only(['comment', 'index'])

//        $contactInformation = $user->contactInformation()->create($dataContact)


        $cart = session()->get('cart', []);
        if ($cart === []) {
            return redirect()->back()->with('error', 'Корзина пуста');
        }
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        $dataToStoreContact = $request->only(['city', 'street', 'home', 'flat', 'index']);
        $dataToStoreOrder = array_merge($request->only(['first_name', 'last_name', 'patronymic', 'phone', 'email', 'comment']), [
            'total' => $total,
        ]);
        $contactInformation = $user->contactInformation()->updateOrCreate(['user_id' => $user->id], $dataToStoreContact);
        $dataToStoreOrder['contact_information_id'] = $contactInformation->id;
        $order = $user->orders()->create($dataToStoreOrder);

        foreach ($cart as $id => $item) {
            $product = Product::findOrFail($id);
            $order->products()->attach($product, ['quantity' => $item['quantity'], 'price' => $item['price']]);
        }
        session()->forget('cart');
        return redirect()->route('user.orders.index');
    }
}
