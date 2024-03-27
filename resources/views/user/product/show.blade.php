@extends('layouts.main')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-5">
            @php
                $images = $product->getMedia('products');
            @endphp

            <div class="card-slider-img">
                <div class="card-slider">
                    <div class="card-slider__nav slider-nav">
                        <div class="swiper-wrapper">
                            @foreach($images as $image)
                                <div class="swiper-slide">
                                    <div class="slider-nav__item">
                                        <img src="{{ $image->getUrl() }}" alt="Фото товара">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="swiper-button-next">
                            <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.75 1.5L8 7.75L14.25 1.5" stroke="black" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </button>
                        <button class="swiper-button-prev">
                            <svg width="16" height="9" viewBox="0 0 16 9" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.75 1.5L8 7.75L14.25 1.5" stroke="black" stroke-width="2"
                                      stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                    <div class="card-slider__block slider-block">
                        <div class="swiper-wrapper">
                            @foreach($images as $image)
                                <div class="swiper-slide">
                                    <img src="{{ $image->getUrl() }}" alt="Фото товара">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-4">
            <span class="vendor">Артикул: {{ $product->code }}</span>
            <h1 class="product-name mt-3">{{ $product->name }}</h1>


            <div class="product-info mt-3">
                <div class="list__info d-flex mt-2">
                    <dl class="list__info__1 d-flex mb-1">
                        <dt class="title__info w-33">
                            <span>Тип</span>
                        </dt>
                        <div class="dots w-33"></div>
                        <dd class="pirt">
                            @if($product->category->id === 1)
                                {{\App\Enums\CandleType::getCandleType(\App\Enums\CandleType::from($product->characteristics->type))}}
                            @elseif($product->category->id === 2)
                                {{ \App\Enums\DiffusserType::getDiffusserType(\App\Enums\DiffusserType::from($product->characteristics->type_diffuser)) }}
                            @endif
                        </dd>
                    </dl>

                    <dl class="list__info__1 d-flex mb-1">
                        <dt class="title__info w-33">
                            <span>Высота, см</span>
                        </dt>
                        <div class="dots w-33"></div>
                        <dd class="pirt">
                            {{$product->characteristics->height}}
                        </dd>
                    </dl>

                    <dl class="list__info__1 d-flex mb-1">
                        <dt class="title__info w-33">
                            <span>Аромат</span>
                        </dt>
                        <div class="dots w-33"></div>
                        <dd class="pirt">
                            {{$product->characteristics->aroma}}
                        </dd>
                    </dl>

                    <dl class="list__info__1 d-flex mb-1">
                        <dt class="title__info w-33">
                            @if($product->category->id === 1)
                                <span>Время горения, ч</span>
                            @elseif($product->category->id === 2)
                                <span>Вид ароматизатора</span>
                            @endif
                        </dt>
                        <div class="dots w-33"></div>
                        <dd class="pirt">
                            @if($product->category->id === 1)
                                {{$product->characteristics->burning_time}}
                            @elseif($product->category->id === 2)
                                {{ \App\Enums\FlavoringType::getFlavoringType(\App\Enums\FlavoringType::from($product->characteristics->type_of_flavoring)) }}
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>

            <a href="#section__title" class="link-more">Подробнее о товаре</a>
        </div>

        <div class="col-3">
            <div class="price-card rounded-2">
                <div class="price mb-3">
                    <span class="product__price">{{ number_format($product->price, 0, '', ' ')}} ₽</span>
                </div>
                <div class="mt-auto">
                    <a href="" class="btn btn-dark w-100">Добавить в корзину</a>
                </div>

                <div class="shop mt-3">
                    <img src="{{ asset('image/icons/shop.svg') }}">
                    <a href="{{ route('shop.show', $product->shop) }}"
                       class="shop-link ms-1 link-gray link-underline link-underline-opacity-0">
                        {{ $product->shop->name }}
                    </a>
                </div>
            </div>
        </div>

        <div class="col-9 mt-5">
            <div class="product__description">
                <h2 class="section__title">Описание</h2>
                <p> {{ $product->description }}</p>
            </div>

            <div class="product__characteristics mt-5">
                <h2 class="section__title" id="section__title">Характеристики</h2>
                <div class="ch__info mt-3">
                    <div class="section__description">
                        <span>Общие</span>
                    </div>
                    <div class="section__info d-flex flex-wrap">
                        <div class="w-100 d-flex flex-wrap">
                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    <span>Страна производитель</span>
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    {{\App\Enums\Country::getCountry(\App\Enums\Country::from($product->characteristics->country_of_manufacture))}}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="ch__info mt-3">
                    <div class="section__description">
                        <span>Основные</span>
                    </div>
                    <div class="section__info d-flex flex-wrap">
                        <div class="w-100 d-flex flex-wrap">
                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    <span>Аромат</span>
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    {{$product->characteristics->aroma}}
                                </dd>
                            </dl>

                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    @if($product->category->id === 1)
                                        <span>Время горения, ч</span>
                                    @elseif($product->category->id === 2)
                                        <span>Вид ароматизатора</span>
                                    @endif
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    @if($product->category->id === 1)
                                        {{$product->characteristics->burning_time}}
                                    @elseif($product->category->id === 2)
                                        {{ \App\Enums\FlavoringType::getFlavoringType(\App\Enums\FlavoringType::from($product->characteristics->type_of_flavoring)) }}
                                    @endif
                                </dd>
                            </dl>
                        </div>

                        <div class="w-100 d-flex flex-wrap">
                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    @if($product->category->id === 1)
                                        <span>Вид фитиля</span>
                                    @elseif($product->category->id === 2)
                                        <span>Размещение ароматизатора</span>
                                    @endif
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    @if($product->category->id === 1)
                                        {{ \App\Enums\WickType::getWickType(\App\Enums\WickType::from($product->characteristics->wick_type)) }}
                                    @elseif($product->category->id === 2)
                                        {{ \App\Enums\DiffuserPlacement::getDiffuserPlacement(\App\Enums\DiffuserPlacement::from($product->characteristics->diffuser_placement)) }}
                                    @endif
                                </dd>
                            </dl>

                            @if($product->category->id === 1)
                                <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                    <dt class="title__info w-33">
                                        <span>Состав</span>
                                    </dt>
                                    <div class="dots w-33"></div>
                                    <dd class="pirt">
                                        {{ \App\Enums\CandleComposition::getCandleComposition( \App\Enums\CandleComposition::from($product->characteristics->compound)) }}
                                    </dd>
                                </dl>
                            @endif
                        </div>


                    </div>
                </div>

                <div class="ch__info mt-3">
                    <div class="section__description">
                        <span>Размеры</span>
                    </div>
                    <div class="section__info d-flex flex-wrap">
                        <div class="w-100 d-flex flex-wrap">
                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    <span>Высота, см</span>
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    {{$product->characteristics->height}}
                                </dd>
                            </dl>

                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    <span>Объем, мл</span>
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    {{$product->characteristics->volume}}
                                </dd>
                            </dl>
                        </div>

                        <div class="w-100 d-flex flex-wrap">
                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    <span>Вес, гр</span>
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    {{$product->characteristics->weight}}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="ch__info mt-3">
                    <div class="section__description">
                        <span>Дополнительные</span>
                    </div>
                    <div class="section__info d-flex flex-wrap">
                        <div class="w-100 d-flex flex-wrap">
                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    <span>Цвет</span>
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    {{ \App\Enums\Color::getColor(\App\Enums\Color::from($product->characteristics->color)) }}
                                </dd>
                            </dl>

                            <dl class="list__info__1 d-flex mb-1 w-50 mt-2">
                                <dt class="title__info w-33">
                                    <span>Тип</span>
                                </dt>
                                <div class="dots w-33"></div>
                                <dd class="pirt">
                                    @if($product->category->id === 1)
                                        {{\App\Enums\CandleType::getCandleType(\App\Enums\CandleType::from($product->characteristics->type))}}
                                    @elseif($product->category->id === 2)
                                        {{ \App\Enums\DiffusserType::getDiffusserType(\App\Enums\DiffusserType::from($product->characteristics->type_diffuser)) }}
                                    @endif
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/slider.js') }}"></script>
@endsection
