@extends('layouts.main')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
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
        <div class="col-6">
            <div class="product-info-wrapper">
                <div class="product-info-heading">
                    <div class="add-info">
                        <div class="product-info-art">Артикул: {{ $product->code }}</div>
                        <div class="product-info-shop">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2.50879 9.35001V13.0917C2.50879 16.8333 4.00879 18.3333 7.75046 18.3333H12.2421C15.9838 18.3333 17.4838 16.8333 17.4838 13.0917V9.35001" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M9.99975 10C11.5247 10 12.6497 8.75834 12.4997 7.23334L11.9497 1.66667H8.05808L7.49975 7.23334C7.34975 8.75834 8.47475 10 9.99975 10Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M15.2587 10C16.942 10 18.1753 8.63334 18.0087 6.95834L17.7753 4.66667C17.4753 2.50001 16.642 1.66667 14.4587 1.66667H11.917L12.5003 7.50834C12.642 8.88334 13.8837 10 15.2587 10Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.69966 10C6.07466 10 7.31632 8.88334 7.44966 7.50834L7.63299 5.66667L8.03299 1.66667H5.49133C3.30799 1.66667 2.47466 2.50001 2.17466 4.66667L1.94966 6.95834C1.78299 8.63334 3.01632 10 4.69966 10Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M10.0003 14.1667C8.60866 14.1667 7.91699 14.8583 7.91699 16.25V18.3333H12.0837V16.25C12.0837 14.8583 11.392 14.1667 10.0003 14.1667Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <div class="product-info-shop__text">
                                <a href="{{ route('shop.show', $product->shop) }}">
                                    {{ $product->shop->name }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="product-name">
                        <h1 class="product-name__text">
                            {{ $product->name }}
                        </h1>
                    </div>
                    <div class="product-info-rating">
                        <svg width="120" height="20" viewBox="0 0 120 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.85449 18.3333L6.20866 12.4792L1.66699 8.54167L7.66699 8.02083L10.0003 2.5L12.3337 8.02083L18.3337 8.54167L13.792 12.4792L15.1462 18.3333L10.0003 15.2292L4.85449 18.3333Z" fill="#694934"/>
                            <path d="M29.8545 18.3333L31.2087 12.4792L26.667 8.54167L32.667 8.02083L35.0003 2.5L37.3337 8.02083L43.3337 8.54167L38.792 12.4792L40.1462 18.3333L35.0003 15.2292L29.8545 18.3333Z" fill="#694934"/>
                            <path d="M54.8545 18.3333L56.2087 12.4792L51.667 8.54167L57.667 8.02083L60.0003 2.5L62.3337 8.02083L68.3337 8.54167L63.792 12.4792L65.1462 18.3333L60.0003 15.2292L54.8545 18.3333Z" fill="#694934"/>
                            <path d="M79.8545 18.3333L81.2087 12.4792L76.667 8.54167L82.667 8.02083L85.0003 2.5L87.3337 8.02083L93.3337 8.54167L88.792 12.4792L90.1462 18.3333L85.0003 15.2292L79.8545 18.3333Z" fill="#694934"/>
                            <path d="M104.854 18.3333L106.209 12.4792L101.667 8.54167L107.667 8.02083L110 2.5L112.334 8.02083L118.334 8.54167L113.792 12.4792L115.146 18.3333L110 15.2292L104.854 18.3333Z" fill="#694934"/>
                        </svg>

                        <div class="product-review__count">
                            5 отзывов
                        </div>
                    </div>
                </div>
                <div class="product-info-characteristics">
                    <div class="list-info-wrapper">
                        <dl class="list-info">
                            <dt class="list-info__title">
                                Тип
                            </dt>

                            <div class="dots"></div>

                            <dd class="list-info__value">
                                @if($product->category->id === 1)
                                    {{\App\Enums\CandleType::getCandleType(\App\Enums\CandleType::from($product->characteristics->type))}}
                                @elseif($product->category->id === 2)
                                    {{ \App\Enums\DiffusserType::getDiffusserType(\App\Enums\DiffusserType::from($product->characteristics->type_diffuser)) }}
                                @endif
                            </dd>
                        </dl>

                        <dl class="list-info">
                            <dt class="list-info__title">
                                Высота, см
                            </dt>

                            <div class="dots"></div>

                            <dd class="list-info__value">
                                {{$product->characteristics->height}}
                            </dd>
                        </dl>

                        <dl class="list-info">
                            <dt class="list-info__title">
                                Аромат
                            </dt>

                            <div class="dots"></div>

                            <dd class="list-info__value">
                                @foreach($product->aromas()->get() as $index => $aroma)
                                    {{$aroma->name}}{{ $index < $product->aromas()->count() - 1 ? ',' : '' }}
                                @endforeach
                            </dd>
                        </dl>

                        <dl class="list-info">
                            <dt class="list-info__title">
                                @if($product->category->id === 1)
                                    <span>Время горения, ч</span>
                                @elseif($product->category->id === 2)
                                    <span>Вид ароматизатора</span>
                                @endif
                            </dt>

                            <div class="dots"></div>

                            <dd class="list-info__value">
                                @if($product->category->id === 1)
                                    {{$product->characteristics->burning_time}}
                                @elseif($product->category->id === 2)
                                    {{ \App\Enums\FlavoringType::getFlavoringType(\App\Enums\FlavoringType::from($product->characteristics->type_of_flavoring)) }}
                                @endif
                            </dd>
                        </dl>

                        <a href="" class="link">Подробнее о товаре</a>
                    </div>
                </div>
                <div class="product-info-bottom">
                    <div class="product-price">
                        {{ number_format($product->price, 0, '', ' ')}} ₽
                    </div>
                    <div class="product-btn">
                        <a href="{{ route('addProductToCart', $product->id) }}" class="btn btn-black w-100 mt-auto">Добавить в корзину</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-9" style="margin-top: 50px">
            <div class="product-description">
                <h2 class="section__title">Описание</h2>
                <p class="product-description__text"> {{ $product->description }}</p>
            </div>

            <div class="product-characteristics">
                <div class="section__title">
                    Характеристики
                </div>

                <div class="section-info">
                    <div class="section__description">Общие</div>

                    <div class="characteristics-wrapper">
                        <div class="list-wrapper">
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    Страна производитель
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    {{\App\Enums\Country::getCountry(\App\Enums\Country::from($product->characteristics->country_of_manufacture))}}
                                </dd>
                            </dl>
                        </div>

                    </div>
                </div>

                <div class="section-info">
                    <div class="section__description">Основные</div>

                    <div class="characteristics-wrapper">
                        <div class="list-wrapper">
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    Аромат
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    @foreach($product->aromas()->get() as $index => $aroma)
                                        {{$aroma->name}}{{ $index < $product->aromas()->count() - 1 ? ',' : '' }}
                                    @endforeach
                                </dd>
                            </dl>
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    @if($product->category->id === 1)
                                        <span>Время горения, ч</span>
                                    @elseif($product->category->id === 2)
                                        <span>Вид ароматизатора</span>
                                    @endif
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    @if($product->category->id === 1)
                                        {{$product->characteristics->burning_time}}
                                    @elseif($product->category->id === 2)
                                        {{ \App\Enums\FlavoringType::getFlavoringType(\App\Enums\FlavoringType::from($product->characteristics->type_of_flavoring)) }}
                                    @endif
                                </dd>
                            </dl>
                        </div>

                        <div class="list-wrapper">
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    @if($product->category->id === 1)
                                        <span>Вид фитиля</span>
                                    @elseif($product->category->id === 2)
                                        <span>Размещение ароматизатора</span>
                                    @endif
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    @if($product->category->id === 1)
                                        {{ \App\Enums\WickType::getWickType(\App\Enums\WickType::from($product->characteristics->wick_type)) }}
                                    @elseif($product->category->id === 2)
                                        {{ \App\Enums\DiffuserPlacement::getDiffuserPlacement(\App\Enums\DiffuserPlacement::from($product->characteristics->diffuser_placement)) }}
                                    @endif
                                </dd>
                            </dl>

                            @if($product->category->id === 1)
                                <dl class="list-info">
                                    <dt class="list-info__title">
                                        Состав
                                    </dt>

                                    <div class="dots"></div>

                                    <dd class="list-info__value">
                                        {{ \App\Enums\CandleComposition::getCandleComposition( \App\Enums\CandleComposition::from($product->characteristics->compound)) }}
                                    </dd>
                                </dl>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="section-info">
                    <div class="section__description">Размеры</div>

                    <div class="characteristics-wrapper">
                        <div class="list-wrapper">
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    Высота, см
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    {{$product->characteristics->height}}
                                </dd>
                            </dl>
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    Вес, гр
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    {{$product->characteristics->weight}}
                                </dd>
                            </dl>
                        </div>

                        <div class="list-wrapper">
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    Объем, мл
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    {{$product->characteristics->volume}}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>

                <div class="section-info">
                    <div class="section__description">Дополнительные</div>

                    <div class="characteristics-wrapper">
                        <div class="list-wrapper">
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    Цвет
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
                                    {{ \App\Enums\Color::getColor(\App\Enums\Color::from($product->characteristics->color)) }}
                                </dd>
                            </dl>
                        </div>

                        <div class="list-wrapper">
                            <dl class="list-info">
                                <dt class="list-info__title">
                                    Тип
                                </dt>

                                <div class="dots"></div>

                                <dd class="list-info__value">
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
