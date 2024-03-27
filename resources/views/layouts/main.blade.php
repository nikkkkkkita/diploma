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
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow justify-content-between">
            <a href="{{ route('home') }}" class="link-underline link-underline-opacity-0 link-dark">
                <h5 class="my-0 mr-md-auto font-weight-normal">CANDELA</h5>
            </a>
            @livewire('search-bar')
            <nav class="my-2 my-md-0 mr-md-3 nav">





                <div class="nav-item__wrapper">
                    @if(Auth::user())
                        <div class="dropdown">
                            <div class="nav__item dropdown-toggle" role="button" id="dropdownMenuLink"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                <a class="nav__link">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                        <path
                                            d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                    <span>Аккаунт</span>
                                </a>
                            </div>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                @if(\Illuminate\Support\Facades\Auth::user()->isAdmin())
                                    <li><a class="dropdown-item" href="{{ route('admin.application.index') }}">Личный кабинет админ</a></li>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->isUser())
                                    <li><a class="dropdown-item" href="{{ route('user.account') }}">Личный кабинет</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Выйти</a></li>
                            </ul>
                        </div>


                    @else
                        <div class="dropdown">
                            <div class="nav__item dropdown-toggle" role="button" id="dropdownMenuLink"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                <a class="nav__link">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                        <path
                                            d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22"
                                            stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round"/>
                                    </svg>
                                    <span>Войти</span>
                                </a>
                            </div>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{ route('register') }}">Регистрация</a></li>
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Войти</a></li>
                            </ul>
                        </div>
                    @endif
                        <div class="nav__item">
                            <a class="nav__link" href="{{ route('cart') }}">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.39999 6.5H15.6C19 6.5 19.34 8.09 19.57 10.03L20.47 17.53C20.76 19.99 20 22 16.5 22H7.50999C3.99999 22 3.23999 19.99 3.53999 17.53L4.44 10.03C4.66 8.09 4.99999 6.5 8.39999 6.5Z"
                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"/>
                                    <path d="M8 8V4.5C8 3 9 2 10.5 2H13.5C15 2 16 3 16 4.5V8" stroke="#292D32"
                                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <span>Корзина</span>
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
            </nav>
        </div>
    </div>
    <div class="submenu">
       <div class="container">
           <div class="nav-item__wrapper">
               <div class="nav__item">
                   <a class="submenu__link" href="{{ route('catalog') }}">Каталог</a>
               </div>
           </div>
       </div>
    </div>
</header>
@yield('slider')
<main class="mt-5">
    <div class="container-xxl">
        @yield('content')
    </div>

</main>

<footer class="pt-4 my-md-5 pt-md-5 border-top">
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
@yield('scripts')
</body>
</html>
