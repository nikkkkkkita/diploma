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
                            <div class="order-card">
                                <div class="order-card__img card-img">
                                    <img src="{{ $product->image }}" alt="Фото продукта" class="product-img">
                                </div>
                                <div class="order-card__info">
                                    <p class="product__name">{{ $product->name }}</p>
                                    <span
                                        class="product__count">Количество • {{ $product->order[0]->quantity }} • {{ \App\Enums\OrderStatusEnum::getOrderStatusName(\App\Enums\OrderStatusEnum::from($product->order[0]->status))  }}</span>
                                    <p class="product__price">{{   number_format($product->order[0]->price, 0, '', ' ')}}
                                        ₽</p>
                                </div>

                                <div class="shop">
                                    <a href="{{route('shop.show', \App\Models\Shop::find($product->shop->id))}}"
                                       target="_blank">{{$product->shop->name}}</a>
                                </div>
                                @if($product->order[0]->status !== 'delivered')
                                    <form action="{{route('shop.orders.update', $product->order[0]->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">Изменить статус
                                            </button>
                                            @php
                                                $statuses = \App\Enums\OrderStatusEnum::availableStatuses($product->order[0]->status);
                                            @endphp
                                            <ul class="dropdown-menu">
                                                @foreach($statuses as $status)
                                                    <li>
                                                        <button name="status" class="dropdown-item"
                                                                value="{{$status['value']}}">{{$status['name']}}</button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
