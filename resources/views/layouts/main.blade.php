<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
    @livewireStyles
</head>
<body>
<header>
    <div class="container">
        <div class="nav">
            <a href="{{ route('home') }}" class="link-underline link-underline-opacity-0 link-dark">
                <h5 class="my-0 mr-md-auto font-weight-normal">CANDELA</h5>
            </a>
            @livewire('search-bar')
            <div class="nav-links">
                <div class="nav-item__wrapper">
                    @if(Auth::user())
                        <div class="dropdown">
                            <div class="nav__item dropdown-toggle" role="button" id="dropdownMenuLink"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                <a class="nav__link">
                                    <span class="nav__link-svg">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </span>
                                    <span class="nav__link-text">Аккаунт</span>
                                </a>
                            </div>

                            @php
                                $userName = Auth::user()->first_name;
                            @endphp
                            <ul class="dropdown-menu menu-dropdown" aria-labelledby="dropdownMenuLink">
                                <li class="dropdown-item__wrapper">
                                    <div class="user-name">
                                        {{$userName}}
                                    </div>
                                </li>
                                <li class="dropdown-item__wrapper">
                                    <div class="menu__line"></div>
                                </li>
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                    <li class="dropdown-item__wrapper">
                                        <a class="dropdown-item" href="{{ route('admin.application.index') }}">
                                            <div class="link-wrapper">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.605 16.2151C12.945 16.4101 12.165 16.5001 11.25 16.5001H6.75002C5.83502 16.5001 5.05502 16.4101 4.39502 16.2151C4.56002 14.2651 6.56252 12.7275 9.00002 12.7275C11.4375 12.7275 13.44 14.2651 13.605 16.2151Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 14.085 2.355 15.6375 4.395 16.215C4.56 14.265 6.5625 12.7275 9 12.7275C11.4375 12.7275 13.44 14.265 13.605 16.215C15.645 15.6375 16.5 14.085 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5ZM9 10.6275C7.515 10.6275 6.315 9.42001 6.315 7.93501C6.315 6.45001 7.515 5.25 9 5.25C10.485 5.25 11.685 6.45001 11.685 7.93501C11.685 9.42001 10.485 10.6275 9 10.6275Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.6849 7.93501C11.6849 9.42001 10.4849 10.6275 8.99994 10.6275C7.51494 10.6275 6.31494 9.42001 6.31494 7.93501C6.31494 6.45001 7.51494 5.25 8.99994 5.25C10.4849 5.25 11.6849 6.45001 11.6849 7.93501Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <span class="link__text">
                                                    Личный кабинет
                                                </span>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->isUser())
                                    <li class="dropdown-item__wrapper">
                                        <a class="dropdown-item" href="{{ route('user.account') }}">
                                            <div class="link-wrapper">
                                               <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M13.605 16.2151C12.945 16.4101 12.165 16.5001 11.25 16.5001H6.75002C5.83502 16.5001 5.05502 16.4101 4.39502 16.2151C4.56002 14.2651 6.56252 12.7275 9.00002 12.7275C11.4375 12.7275 13.44 14.2651 13.605 16.2151Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                   <path d="M11.25 1.5H6.75C3 1.5 1.5 3 1.5 6.75V11.25C1.5 14.085 2.355 15.6375 4.395 16.215C4.56 14.265 6.5625 12.7275 9 12.7275C11.4375 12.7275 13.44 14.265 13.605 16.215C15.645 15.6375 16.5 14.085 16.5 11.25V6.75C16.5 3 15 1.5 11.25 1.5ZM9 10.6275C7.515 10.6275 6.315 9.42001 6.315 7.93501C6.315 6.45001 7.515 5.25 9 5.25C10.485 5.25 11.685 6.45001 11.685 7.93501C11.685 9.42001 10.485 10.6275 9 10.6275Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                   <path d="M11.6849 7.93501C11.6849 9.42001 10.4849 10.6275 8.99994 10.6275C7.51494 10.6275 6.31494 9.42001 6.31494 7.93501C6.31494 6.45001 7.51494 5.25 8.99994 5.25C10.4849 5.25 11.6849 6.45001 11.6849 7.93501Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                               </svg>
                                                <span class="link__text">
                                                    Личный кабинет
                                                </span>
                                            </div>
                                            </a>
                                    </li>
                                @endif
                                    <li class="dropdown-item__wrapper">
                                        <div class="menu__line"></div>
                                    </li>
                                <li class="dropdown-item__wrapper">
                                    <a class="dropdown-item dropdown-item-fl" href="{{ route('logout') }}">
                                        <div class="link-wrapper">
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.67505 5.66993C6.90755 2.96993 8.29505 1.86743 11.3325 1.86743H11.43C14.7825 1.86743 16.125 3.20993 16.125 6.56243V11.4524C16.125 14.8049 14.7825 16.1474 11.43 16.1474H11.3325C8.31755 16.1474 6.93005 15.0599 6.68255 12.4049" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M1.5 9H11.16" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9.48755 6.48755L12 9.00005L9.48755 11.5125" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="link__text">
                                                Выйти
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    @else
                        <div class="dropdown">
                            <div class="nav__item dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <a class="nav__link">
                                    <span class="nav__link-svg">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    </span>
                                    <span class="nav__link-text">Войти</span>
                                </a>
                            </div>

                            <ul class="dropdown-menu menu-dropdown" aria-labelledby="dropdownMenuLink">
                                <li class="dropdown-item__wrapper">
                                    <a class="dropdown-item" href="{{ route('login') }}">Войти</a>
                                </li>
                                <li class="dropdown-item__wrapper">
                                    <div class="menu__line"></div>
                                </li>
                                <li class="dropdown-item__wrapper">
                                    <a class="dropdown-item" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            </ul>
                        </div>
                    @endif
                    <div class="nav__item">
                        <a class="nav__link" href="{{ route('cart') }}">
                            <span class="nav__link-svg">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.39999 6.5H15.6C19 6.5 19.34 8.09 19.57 10.03L20.47 17.53C20.76 19.99 20 22 16.5 22H7.50999C3.99999 22 3.23999 19.99 3.53999 17.53L4.44 10.03C4.66 8.09 4.99999 6.5 8.39999 6.5Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M8 8V4.5C8 3 9 2 10.5 2H13.5C15 2 16 3 16 4.5V8" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            </span>
                            <span class="nav__link-text">Корзина</span>
                            @php
                                $count = 0;
                                if (session()->has('cart')){
                                    $carts = session()->get('cart');
                                    foreach ($carts as $cart) {
                                        $count += $cart['quantity'];
                                    }
                                }
                            @endphp
                            <span class="count">
                                @if($count > 0)
                                    {{$count}}
                                @endif
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="submenu">
        <div class="container">
            <div class="nav-item__wrapper">
                <div class="nav__item">
                    <a class="submenu__link" href="{{ route('catalog') }}">
                        <div class="link-wrapper">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5 5.83325H2.5" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M15 10H2.5" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                                <path d="M11.6667 14.1667H2.50002" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                            <span class="link__text">
                                Каталог
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
@yield('slider')
<main class="pt-5">
    <div class="container-xxl">
        @yield('content')
    </div>
</main>

<footer class="pt-4 my-md-5  pt-md-5 border-top">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md">
                <img class="mb-2" src="/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">
                <small class="d-block mb-3 text-muted">© 2017-2018</small>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Cool stuff</a></li>
                    <li><a class="text-muted" href="#">Random feature</a></li>
                    <li><a class="text-muted" href="#">Team feature</a></li>
                    <li><a class="text-muted" href="#">Stuff for developers</a></li>
                    <li><a class="text-muted" href="#">Another one</a></li>
                    <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Resource</a></li>
                    <li><a class="text-muted" href="#">Resource name</a></li>
                    <li><a class="text-muted" href="#">Another resource</a></li>
                    <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="text-muted" href="#">Team</a></li>
                    <li><a class="text-muted" href="#">Locations</a></li>
                    <li><a class="text-muted" href="#">Privacy</a></li>
                    <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('js/validation.js') }}"></script>
<script src="{{asset('js/inputs.js')}}"></script>
@yield('scripts')
</body>
</html>
