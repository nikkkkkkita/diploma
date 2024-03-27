<div id="search-bar" class="search-bar">
    <form class="d-flex search-bar__form" role="search">
        <span>
{{--            <img src="{{asset('image/icons/search-normal.svg')}}">--}}
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M11.5 21C16.7467 21 21 16.7467 21 11.5C21 6.25329 16.7467 2 11.5 2C6.25329 2 2 6.25329 2 11.5C2 16.7467 6.25329 21 11.5 21Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M22 22L20 20" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
        </span>
        <input wire:model.live="search" class="form-control search-bar__input" type="search" placeholder="Я ищу..." aria-label="Search">
    </form>
    @if(sizeof($products) > 0 || sizeof($categories) > 0)
        <div class="dropdown-menu d-block py-0 mt-2 search-bar__menu">
            @foreach($products as $product)
                <div class="px-3 py-1 border-bottom">
                    <a href="{{ route('product.show', $product) }}" class="link-underline link-underline-opacity-0 link-dark">
                        <div class="d-flex flex-column ml-3">
                            <span>{{ $product->name }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
                @foreach($categories as $category)
                    <div class="px-3 py-1 border-bottom">
                        @if($category->id === 1)
                            <a href="{{ '/catalog?category=candles' }}" class="link-underline link-underline-opacity-0 link-dark">
                                <div class="d-flex flex-column ml-3">
                                    <span>Свечи</span>
                                    <p class="product-count">Каталог > Свечи</p>
                                </div>
                            </a>
                        @elseif($category->id === 2)
                            <a href="{{ '/catalog?category=diffusor' }}" class="link-underline link-underline-opacity-0 link-dark">
                                <div class="d-flex flex-column ml-3">
                                    <span>Диффузоры</span>
                                    <p class="product-count">Каталог > Диффузоры</p>
                                </div>
                            </a>
                        @endif
                    </div>
                @endforeach
        </div>
    @endif
</div>
