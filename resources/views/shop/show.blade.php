@extends('layouts.main')

@section('title')
    {{$shop->name}}
@endsection

@section('content')
    <div class="container mt-5">

        <div class="page_block">
            <div class="shop-cover">
                <div class="shop-cover__img"
                     style="background-image: url('{{ asset("storage/" . $shop->header) }}')"></div>
            </div>
            <div class="shop-info">
                <div class="shop-info__avatar">
                    <img src="{{asset('storage/' . $shop->avatar)}}" alt="Аватар"
                         class="img-fluid rounded-circle shop-avatar">
                </div>
                <div class="shop-info__main">
                    <h3 class="shop_name">{{ $shop->name }}</h3>
                    <p class="shop_description">{{ $shop->description }}</p>
                </div>
                <div class="shop-info__links">
                    <ul class="list-inline">
                        @foreach($links as $link)
                            <li class="list-inline-item">
                                <a target="_blank" href="{{ $link['link'] }}" class="link-gray">{{ $link['name'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Секция с товарами -->
        <div class="row mt-5">
            <div class="col">
                <h2>Товары</h2>
                <div class="row">
                    <!-- Пример товара -->
                    @foreach($products as $product)

                        <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4 mt-4">
                            <div class="card-wrapper">
                                <a href="{{ route('product.show', $product) }}" class="link-underline link-underline-opacity-0 link-dark">
                                    <div class="card h-100">
                                        <div class="card-img">
                                            @if($product->hasMedia('products'))
                                                <img src="{{ $product->getFirstMediaUrl('products') }}" alt="Товар" class="product-img">
                                            @else
                                                <img src="{{ asset('image/product-placeholder.jpg') }}" alt="">
                                            @endif
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <div class="card-info">
                                                <span class="card-price">{{ number_format($product->price, 0, '', ' ')}} ₽</span>
                                                <div class="card-title">
                                                    <span class="card-name">{{ $product->name }}</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('addProductToCart', $product->id) }}" class="btn btn-black w-100 mt-auto add-to-cart-btn">Купить</a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <!-- Добавьте другие товары по аналогии -->
                </div>
            </div>
        </div>
    </div>

@endsection
