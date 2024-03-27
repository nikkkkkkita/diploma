<div class="col-3">
    <div class="d-flex flex-column flex-shrink-0 p-3 menu-lk" style="width: 280px;">
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link {{ active_link('#') }}" aria-current="page">
                    <img src="{{ asset('image/icons/home.svg') }}" class="me-2">
                    Главная
                </a>
            </li>
            <li>
                <a href="{{ route('user.orders.index') }}" class="nav-link {{ active_link('user.orders*') }}">
                    <img src="{{ asset('image/icons/shopping-bag.svg') }}" class="me-2">
                    Заказы
                </a>
            </li>
            <li>
                <a href="{{ route('shop.orders') }}" class="nav-link {{ active_link('shop.orders*') }}">
                    <img src="{{ asset('image/icons/shopping-bag.svg') }}" class="me-2">
                    Все заказы
                </a>
            </li>
            <li>
                <a href="{{ route('user.application.index') }}" class="nav-link {{ active_link('user.application*') }}">
                    <img src="{{ asset('image/icons/shop-add.svg') }}" class="me-2">
                    Начать продавать
                </a>
            </li>
            @if($application && $application->status === \App\Enums\StatusEnum::ACCEPTED->value && !$shop)
                <li>
                    <a href="{{ route('user.shop.create') }}" class="nav-link">
                        <img src="{{ asset('image/icons/shop-add.svg') }}" class="me-2">
                        Создать магазин
                    </a>
                </li>
            @endif

            @if($application && $application->status === \App\Enums\StatusEnum::ACCEPTED->value && $shop)
                <li>
                    <a href="{{route('user.shop.edit')}}" class="nav-link">
                        <img src="{{ asset('image/icons/shop_edit.svg') }}" class="me-2">
                        Настроить магазин
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.product') }}" class="nav-link {{ active_link('user.product') }}">
                        <img src="{{ asset('image/icons/product.svg') }}" class="me-2">
                        Товары
                    </a>
                </li>
            @endif

            <li>

            </li>
        </ul>
        @if($application && $application->status === \App\Enums\StatusEnum::ACCEPTED->value && $shop)
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="{{ route('shop.show', \Illuminate\Support\Facades\Auth::user()->shop) }}"
                       class="nav-link link-body-emphasis">
                        <img src="{{ asset('image/icons/shop.svg') }}" class="me-2">
                        Перейти в магазин
                    </a>
                </li>
            </ul>
        @endif
    </div>
</div>
