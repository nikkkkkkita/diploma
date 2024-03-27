<div class="row mt-4">

    <div class="col-3">
        <p class="filter">
            Фильтры
        </p>
        <div class="filter-block">
            <p class="filter-title">Категория</p>
            <fieldset class="form-group filter-group">
                <label class="label-filter">
                    <a href="{{route('catalog', ['category' => 'candles'])}}">Свечи</a>
                </label>
            </fieldset>

            <fieldset class="form-group filter-group">
                <label class="label-filter">
                    <a href="{{route('catalog', ['category' => 'diffusor'])}}">Диффузоры</a>
                </label>
            </fieldset>

            <fieldset class="form-group filter-group">
                <label class="label-filter">
                    <a href="{{route('catalog')}}">Все</a>
                </label>
            </fieldset>
        </div>

        @php
            $minPrice = \App\Models\Product::min('price');
            $maxPrice = \App\Models\Product::max('price');
        @endphp

        <div class="filter-block">
            <p class="filter-title">Цена, ₽</p>
            <fieldset class="form-group filter-group">

                <div class="range-slider">
                    <div class="range-slider__input-wrapper">
                        <div class="range-slider__control">
                            <label for="input-min"></label>
                            <input type="number" name="input-min" id="input-min input-number" pattern="[0-9]" class="range-slider__input-control range-slider__input--min number-validate" value="{{ $minPrice }}" wire:model.change="priceMin">
                        </div>

                        <div class="range-slider__control">
                            <label for="input-max"></label>
                            <input type="number" name="input-max" id="input-max input-number" pattern="[0-9]" class="range-slider__input-control range-slider__input--max number-validate" value="{{ $maxPrice }}" wire:model.change="priceMax">
                        </div>
                    </div>

                    <div class="range-slider__slider">
                        <div class="range-slider__progress-bar">
                            <div class="progress-bar"></div>
                        </div>

                        <div class="range-slider__input">
                            <input type="range" class="range-min" step="1" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $minPrice }}" wire:model.change="priceMin">
                            <input type="range" class="range-max" step="1" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" wire:model.change="priceMax">
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>


{{--        <div class="range-wrapper mt-50">--}}
{{--            <div class="price-input">--}}
{{--                <div class="field">--}}
{{--                    <span>Мин</span>--}}
{{--                    <input type="number" class="input-min" value="{{ $minPrice }}" wire:model.change="priceMin">--}}
{{--                </div>--}}
{{--                <div class="field">--}}
{{--                    <span>Макс</span>--}}
{{--                    <input type="number" class="input-max" value="{{ $maxPrice }}" wire:model.change="priceMax">--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="range-slider">--}}
{{--                <div class="progress-bar"></div>--}}
{{--            </div>--}}
{{--            <div class="range-input">--}}
{{--                <input type="range" class="range-min" step="1" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $minPrice }}" wire:model="priceMin">--}}
{{--                <input type="range" class="range-max" step="1" min="{{ $minPrice }}" max="{{ $maxPrice }}" value="{{ $maxPrice }}" wire:model="priceMax">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        Фильтры для свечей--}}
        @if ($category_id === 1 || !$category_id)
            <div class="filter-block">
                <p class="filter-title">Тип свечи</p>
                <div class="scroll-block">
                    @foreach($types as $type)
                        <fieldset class="form-group filter-group">
                            <label class="filter-label">
                                <input type="checkbox" wire:model.change="selectedCandleTypes" value="{{$type['value']}}">
                                <span class="filter-name">{{$type['name']}}</span>
                            </label>
                        </fieldset>
                    @endforeach
                </div>
            </div>

            <div class="filter-block">
                <p class="filter-title">Воск</p>
                <div class="scroll-block">
                    @foreach($candleCompositions as $candleCompound)
                        <fieldset class="form-group filter-group">
                            <label class="filter-label">
                                <input type="checkbox" wire:model.change="selectedCandleCompositions"
                                       value="{{$candleCompound['value']}}">
                                <span class="filter-name">{{$candleCompound['name']}}</span>
                            </label>
                        </fieldset>
                    @endforeach
                </div>
            </div>

            <div class="filter-block">
                <p class="filter-title">Фитиль</p>
                <div class="scroll-block">
                    @foreach($wick_types as $wick)
                        <fieldset class="form-group filter-group">
                            <label class="filter-label">
                                <input type="checkbox" wire:model.change="selectedWickTypes" value="{{$wick['value']}}">
                                <span class="filter-name">{{$wick['name']}}</span>
                            </label>
                        </fieldset>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="filter-block">
                <p class="filter-title">Страна производства</p>
                <div class="scroll-block">
                    @foreach($countries as $country)
                        <fieldset class="form-group filter-group">
                            <label class="filter-label">
                                <input type="checkbox" wire:model.change="selectedCountries"
                                       value="{{$country['value']}}">
                                <span class="filter-name">{{$country['name']}}</span>
                            </label>
                        </fieldset>
                    @endforeach
                </div>
        </div>






{{--        Фильтры для диффузоров--}}

        @if ($category_id === 2 || !$category_id)
        <div class="filter-block">
            <p class="filter-title">Тип диффузора</p>
            <div class="scroll-block">
                @foreach($dTypes as $dType)
                    <fieldset class="form-group filter-group">
                        <label class="filter-label">
                            <input type="checkbox" wire:model.change="selectedDTypes" value="{{$dType['value']}}">
                            <span class="filter-name">{{$dType['name']}}</span>
                        </label>
                    </fieldset>
                @endforeach
            </div>
        </div>

            <div class="filter-block">
                <p class="filter-title">Вид ароматизатора</p>
                <div class="scroll-block">
                    @foreach($flavoringTypes as $fTypes)
                        <fieldset class="form-group filter-group">
                            <label class="filter-label">
                                <input type="checkbox" wire:model.change="selectedFlavoringTypes"
                                       value="{{$fTypes['value']}}">
                                <span class="filter-name">{{$fTypes['name']}}</span>
                            </label>
                        </fieldset>
                    @endforeach
                </div>
            </div>

            <div class="filter-block" style="height: 140px">
                <p class="filter-title">Размещение ароматизатора</p>
                <div class="scroll-block">
                    @foreach($dPlacements as $dPlacement)
                        <fieldset class="form-group filter-group">
                            <label class="filter-label">
                                <input type="checkbox" wire:model.change="selectedDPlacements"
                                       value="{{$dPlacement['value']}}">
                                <span class="filter-name">{{$dPlacement['name']}}</span>
                            </label>
                        </fieldset>
                    @endforeach
                </div>
            </div>
        @endif



        <div class="filter-block">
            <p class="filter-title">Цвет</p>
            <div class="scroll-block">
                @foreach($colors as $color)
                    <fieldset class="form-group filter-group">
                        <label class="filter-label">
                            <input type="checkbox" wire:model.change="selectedColors" value="{{$color['value']}}">
                            <span class="filter-name">{{$color['name']}}</span>
                        </label>
                    </fieldset>
                @endforeach
            </div>
        </div>
    </div>

    <div class="col-9">
        <div class="sort-block">
            <p class="product-count">
                Найдено {{count($products)}} товаров
            </p>

            <div class="dropdown">
                <button type="button" class="dropdown-toggle dropdown-sort dropdown-sort__btn" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    @if ($sort_order === 'asc')
                        <div>Дешевле</div>
                    @elseif($sort_order === 'desc')
                        <div>Дороже</div>
                    @else
                        <div>Сортировка</div>
                    @endif
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    {{--                <li><a wire:click="setSortOrder('asc')" class="dropdown-item cursor-pointer">Дешевле</a></li>--}}
                    <li class="sort-group">
                        <label for="" class="sort-label">
                            <input type="radio" wire:model.change="sort_order" value="asc"
                                   class="dropdown-item cursor-pointer">
                            <span>Дешевле</span>
                        </label>
                    </li>
                    <li class="sort-group">
                        <label for="" class="sort-label">
                            <input type="radio" wire:model.change="sort_order" value="desc"
                                   class="dropdown-item cursor-pointer">
                            <span>Дороже</span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 mb-4 mt-4">
                    <a href="{{ route('product.show', $product) }}"
                       class="link-underline link-underline-opacity-0 link-dark">
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
                                    <span class="card-price">{{ $product->price }} ₽</span>
                                    <div class="card-title">
                                        <span class="card-name">{{ $product->name }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('addProductToCart', $product->id) }}"
                                   class="btn btn-black w-100 mt-auto add-to-cart-btn">Купить</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{$paginator->links()}}
</div>

<script src="{{ asset('js/range-slider.js') }}"></script>
<script src="{{ asset('js/validation.js') }}"></script>
