@extends('layouts.main')

@section('title')
    Главная страница
@endsection
@section('slider')
    <div class="slider-container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('image/slider-img.jpg') }}" class="d-block w-100 main-slider__img" alt="...">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('image/slider-img-2.jpg') }}" class="d-block w-100 main-slider__img" alt="...">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('image/slider-img-3.jpg') }}" class="d-block w-100 main-slider__img" alt="...">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endsection
@section('content')
{{--    <div id="carouselExampleIndicators" class="carousel slide " data-bs-ride="carousel">--}}
{{--        <div class="carousel-indicators">--}}
{{--            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>--}}
{{--            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>--}}
{{--            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>--}}
{{--        </div>--}}
{{--        <div class="carousel-inner">--}}
{{--            <div class="carousel-item active">--}}
{{--                <img src="{{ asset('image/slider-img.jpg') }}" class="d-block w-100 rounded-2" alt="...">--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img src="{{ asset('image/slider-img.jpg') }}" class="d-block w-100 rounded-2" alt="...">--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img src="{{ asset('image/slider-img.jpg') }}" class="d-block w-100 rounded-2" alt="...">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">--}}
{{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Предыдущий</span>--}}
{{--        </button>--}}
{{--        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">--}}
{{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--            <span class="visually-hidden">Следующий</span>--}}
{{--        </button>--}}
{{--    </div>--}}

    <div class="row mt-5">
        <div class="col">
            <h2>Товары</h2>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
{{--                @php--}}
{{--                    $priceMin = \App\Models\Product::min('price');--}}
{{--                    $priceMax = \App\Models\Product::max('price');--}}
{{--                    dd($priceMin, $priceMax);--}}
{{--                @endphp--}}
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
@endsection
@section('scripts')
    <script src="{{ asset('js/main-slider.js') }}"></script>
@endsection
