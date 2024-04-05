@extends('layouts.main')

@section('title', 'Заказы')

@section('content')
    <div class="container mt-5 row">
        @include('includes.user_menu')
        <div class="col-9">
            <h2>Заказы</h2>
            {{--            <div class="row">--}}
            @foreach(json_decode(json_encode($orders)) as $order)
                <div class="p-card mb-5">
                    <div class="order-list__order-number">
                        <span>Заказ №{{ $order->id }} на {{ number_format( $order->total, 0, '', ' ')}} ₽ • </span>
                    </div>
                    <div class="contacts">
{{--                        поля в contact_information--}}
                        <p>{{$order->contact_information->city}}</p>
                    </div>
                    <div class="order-wrapper">
                        @foreach($order->products as $product)
                            {{dd($order)}}
                            <div class="order-card">
                                <div class="order-card__img card-img">
                                    <img src="{{ $product->image }}" alt="Фото продукта" class="product-img">
                                </div>
                                <div class="order-card__info">
                                    <p class="product__name">{{ $product->name }}</p>
                                    <span class="product__count">Количество • {{ $product->order[0]->quantity }}</span>
                                    <p class="product__price">{{   number_format($product->order[0]->price, 0, '', ' ')}} ₽</p>
                                </div>

                                <div class="shop">
                                    <a href="{{route('shop.show', \App\Models\Shop::find($product->shop->id))}}" target="_blank">{{$product->shop->name}}</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
            </div>
    </div>

            {{--            <div class="row">--}}
            {{--                <div class="p-card">--}}
            {{--                    @php--}}
            {{--                    $total = 0;--}}
            {{--                    @endphp--}}
            {{--                    @foreach($orders as $order)--}}
            {{--                        @php--}}
            {{--                        $total += $order['price'] * $order['quantity'];--}}
            {{--                        $date = $order['created_at'];--}}
            {{--                        @endphp--}}
            {{--                    @endforeach--}}
            {{--                    <span>Заказ на {{ $total }}</span>--}}
            {{--                    <span>{{$date}}</span>--}}

            {{--                    <div class="order-wrapper d-flex mb-5">--}}

            {{--                            @foreach($uniqueProducts as $product)--}}
            {{--                                <div class="product__wrapper">--}}
            {{--                                    <div class="order__img card-img">--}}
            {{--                                        <img src="{{ $product->product->getFirstMediaUrl('products') }}" alt="" class="product-img">--}}
            {{--                                    </div>--}}
            {{--                                   <div class="order__info">--}}
            {{--                                       <span class="order__status">Количество: {{ $groupedProducts[$product->product_id]->count() }}</span>--}}
            {{--                                       <span class="order__status">Статус: {{$product->status}}</span>--}}
            {{--                                       <span class="card-price">{{ $groupedProducts[$product->product_id]->sum('price') }} ₽</span>--}}
            {{--                                   </div>--}}
            {{--                                </div>--}}
            {{--                            @endforeach--}}

            {{--                    </div>--}}
            {{--                </div>--}}

            {{--                       <div class="order-cart">--}}
            {{--                           <span class="order__status">--}}
            {{--                               {{ $order->status }}--}}
            {{--                           </span>--}}
            {{--                           <div class="card h-100">--}}
            {{--                               <div class="card-img">--}}
            {{--                                   <img src="{{ $order->product->getFirstMediaUrl('products') }}" class="product-img">--}}
            {{--                               </div>--}}
            {{--                               <div class="card-body d-flex flex-column">--}}
            {{--                                   <div class="card-info">--}}
            {{--                                       <span class="card-price">{{ $order->product->price }} ₽</span>--}}
            {{--                                   </div>--}}
            {{--                               </div>--}}
            {{--                           </div>--}}
            {{--                           <div class="total-price">--}}
            {{--                               <span>Итого: {{ $order->price }} ₽</span>--}}
            {{--                           </div>--}}
            {{--                       </div>--}}
            {{--                        <span>{{$order->product->name}}</span>--}}
            {{--                    ">--}}
            {{--                       <span>{{ $order->price }}</span>--}}
            {{--                        <span>{{ $order->quantity }}</span>--}}
            {{--                        <span>{{ $order->status }}</span>--}}
            {{--            @endforeach--}}



@endsection
