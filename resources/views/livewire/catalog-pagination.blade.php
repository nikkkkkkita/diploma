<div class="row" style="margin-top: 20px">

    <div class="col-3">
        <div class="filter-wrapper">
            <div class="filter-block-header">
                Фильтры
            </div>

            <div class="filter-block-wrapper">
                <div class="filter-block__heading">
                    Категория
                </div>
                <div class="filter-block">
                    <ul class="filter-list">
                        <li class="filter-container">
                            <a href="{{route('catalog', ['category' => 'candles'])}}" class="filter-link">Свечи</a>
                        </li>
                        <li class="filter-container">
                            <a href="{{route('catalog', ['category' => 'diffusor'])}}" class="filter-link">Диффузоры</a>
                        </li>
                        <li class="filter-container">
                            <a href="{{route('catalog', ['category' => 'candles'])}}" class="filter-link">Все</a>
                        </li>
                    </ul>
                </div>
            </div>

            @php
                $minPrice = \App\Models\Product::min('price');
                $maxPrice = \App\Models\Product::max('price');
            @endphp

            <div class="filter-block-wrapper">
                <div class="filter-block__heading">
                    Цена, ₽
                </div>
                <div class="filter-block">
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
                </div>
            </div>

{{--            Фильтры для свечей--}}

            @if($category_id === 1 || !$category_id)
                <div class="filter-block-wrapper">
                    <div class="filter-block__heading">
                        Тип свечи
                    </div>
                    <div class="filter-block">
                        <ul class="filter-list">
                            @foreach($types as $type)
                                <li class="filter-container">
                                    <label class="filter-label">
                                        <input type="checkbox" wire:model.change="selectedCandleTypes" value="{{$type['value']}}" class="custom-checkbox">
                                        <span class="filter-name">{{$type['name']}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="filter-block-wrapper">
                    <div class="filter-block__heading">
                        Воск
                    </div>
                    <div class="filter-block">
                        <div class="scroll-block">
                            <ul class="filter-list">
                                @foreach($candleCompositions as $candleCompound)
                                    <li class="filter-container">
                                        <label class="filter-label">
                                            <input type="checkbox" wire:model.change="selectedCandleCompositions" value="{{$candleCompound['value']}}" class="custom-checkbox">
                                            <span class="filter-name">{{$candleCompound['name']}}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="filter-block-wrapper">
                    <div class="filter-block__heading">
                        Фитиль
                    </div>
                    <div class="filter-block">
                        <ul class="filter-list">
                            @foreach($wick_types as $wick)
                                <li class="filter-container">
                                    <label class="filter-label">
                                        <input type="checkbox" wire:model.change="selectedWickTypes" value="{{$wick['value']}}" class="custom-checkbox">
                                        <span class="filter-name">{{$wick['name']}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

{{--            Фильтры для диффузоров--}}
            @if($category_id === 2 || !$category_id)
                <div class="filter-block-wrapper">
                    <div class="filter-block__heading">
                        Тип диффузора
                    </div>
                    <div class="filter-block">
                        <div class="scroll-block">
                            <ul class="filter-list">
                                @foreach($dTypes as $dType)
                                    <li class="filter-container">
                                        <label class="filter-label">
                                            <input type="checkbox" wire:model.change="selectedDTypes" value="{{$dType['value']}}" class="custom-checkbox">
                                            <span class="filter-name">{{$dType['name']}}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="filter-block-wrapper">
                    <div class="filter-block__heading">
                        Вид ароматизатора
                    </div>
                    <div class="filter-block">
                        <div class="scroll-block">
                            <ul class="filter-list">
                                @foreach($flavoringTypes as $fTypes)
                                    <li class="filter-container">
                                        <label class="filter-label">
                                            <input type="checkbox" wire:model.change="selectedFlavoringTypes" value="{{$fTypes['value']}}" class="custom-checkbox">
                                            <span class="filter-name">{{$fTypes['name']}}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="filter-block-wrapper">
                    <div class="filter-block__heading">
                        Вид ароматизатора
                    </div>
                    <div class="filter-block">
                        <div class="scroll-block">
                            <ul class="filter-list">
                                @foreach($flavoringTypes as $fTypes)
                                    <li class="filter-container">
                                        <label class="filter-label">
                                            <input type="checkbox" wire:model.change="selectedFlavoringTypes" value="{{$fTypes['value']}}" class="custom-checkbox">
                                            <span class="filter-name">{{$fTypes['name']}}</span>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="filter-block-wrapper">
                    <div class="filter-block__heading">
                        Размещение ароматизатора
                    </div>
                    <div class="filter-block">
                        <ul class="filter-list">
                            @foreach($dPlacements as $dPlacement)
                                <li class="filter-container">
                                    <label class="filter-label">
                                        <input type="checkbox" wire:model.change="selectedDPlacements" value="{{$dPlacement['value']}}" class="custom-checkbox">
                                        <span class="filter-name">{{$dPlacement['name']}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="filter-block-wrapper">
                <div class="filter-block__heading">
                    Аромат
                </div>
                <div class="filter-block">
                    <div class="scroll-block">
                        <ul class="filter-list">
                            @foreach($aromas as $aroma)
                                <li class="filter-container">
                                    <label class="filter-label">
                                        <input type="checkbox" wire:model.change="selectedAromas" value="{{$aroma['value']}}" class="custom-checkbox">
                                        <span class="filter-name">{{$aroma['name']}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="filter-block-wrapper">
                <div class="filter-block__heading">
                    Страна производства
                </div>
                <div class="filter-block">
                    <div class="scroll-block">
                        <ul class="filter-list">
                            @foreach($countries as $country)
                                <li class="filter-container">
                                    <label class="filter-label">
                                        <input type="checkbox" wire:model.change="selectedCountries" value="{{$country['value']}}" class="custom-checkbox">
                                        <span class="filter-name">{{$country['name']}}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
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
                <ul class="dropdown-menu menu-dropdown sort-menu-dropdown" aria-labelledby="dropdownMenuLink">
                    <li class="dropdown-item__wrapper">
                        <label class="sort-label dropdown-item">
                            <input type="radio" wire:model.change="sort_order" value="asc" class="dropdown-item custom-radio cursor-pointer">
                            <span class="link__text">Дешевле</span>
                        </label>
                    </li>
                    <li class="dropdown-item__wrapper">
                        <div class="menu__line"></div>
                    </li>
                    <li class="dropdown-item__wrapper">
                        <label class="sort-label dropdown-item">
                            <input type="radio" wire:model.change="sort_order" value="desc" class="dropdown-item custom-radio cursor-pointer">
                            <span class="link__text">Дороже</span>
                        </label>
                    </li>

                    <li class="dropdown-item__wrapper">
                        <div class="menu__line"></div>
                    </li>

                    <li class="dropdown-item__wrapper">
                        <label class="sort-label dropdown-item dropdown-item-fl">
                            <span class="link__text">Сбросить</span>
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
        {{$paginator->links()}}
    </div>

</div>

<script src="{{ asset('js/range-slider.js') }}"></script>
<script src="{{ asset('js/validation.js') }}"></script>
