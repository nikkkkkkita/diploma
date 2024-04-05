@extends('layouts.main')

@section('title', 'Корзина')

@section('content')
    <style>
        main {
            background-color: rgba(249, 249, 249, 1);
        }
    </style>

    @if($errors -> any())
        <div class="errors">
            <ul class="alert alert-danger mt-2 mb-2">
                @foreach($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(!session('cart'))
        <div class="info-wrap">
            <div class="info-card">
                <div class="info-card-wrap">
                    <div class="info-header">
                        <h2 class="info-header_h">Корзина пуста</h2>
                        <p class="info-header_p">Воспользуйтесь каталогом, чтобы найти то, что вас интересует</p>
                    </div>
                    <div class="card-section-info_bottom">
                        <a href="{{ route('catalog') }}" class="btn btn-black btn-arrow w-100">За покупками</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        @php
            $total = 0;
        @endphp
    @endif

    @if(session('cart'))
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-9">
                <div class="p-card">
                    <h2>Корзина</h2>

                    @foreach(session('cart') as $id => $details)
                        @php
                            $total += $details['price'] * $details['quantity'];
                            $product = \App\Models\Product::find($id);
                        @endphp

                        <div class="product-wrap">

                            <div class="product__img">
                                <img src="{{ $details['image'] }}" class="rounded-2 object-fit-cover" width="100px" height="100px" alt="Продукт">
                            </div>

                            <div class="product__name">
                                {{ $details['name'] }}
                            </div>

                            <div class="product__count">
                                <button type="button" class="btn__min" data-id="{{ $id }}">-</button>
                                <input type="number" disabled class="product_input" min="1" max="{{ $product->count }}" value="{{ $details['quantity'] }}" id="product" data-max="{{$product->count}}" data-id="{{ $id }}">
                                <button type="button" data-id="{{ $id }}" class="btn__plus">+</button>
                            </div>

                            <div class="product__price">
                                {{ number_format($details['price'] * $details['quantity'], 0, '', ' ')}} ₽

                                <div class="btn-wrap">

                                    <form action="{{route('cart.delete', $id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="bg-transparent border-0 btn-delete">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M10.33 16.5H13.66" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M9.5 12.5H14.5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </button>
                                    </form>

                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>

                    <div class="contact-information__form">
                        <h4 class="p-card__header">Контактная информация</h4>
                        @if(Auth::user())
                            <form action="{{route('cart.buy')}}" method="post">
                                @csrf
                                <fieldset>
                                    <div class="input-wrapper">
                                        <div class="form-group">
                                            <input type="text" name="first_name" id=""  class="order-input" value="{{auth()->user()->first_name}}" required>
                                            <label class="input-label">Имя</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="last_name" id="" class="order-input" value="{{auth()->user()->last_name}}" required>
                                            <label class="input-label">Фамилия</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="patronymic" id=""  class="order-input" value="{{auth()->user()->patronymic}}">
                                            <label class="input-label">Отчество</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="tel" name="phone" id="" class="order-input" value="{{auth()->user()->phone}}" required>
                                            <label class="input-label">Номер телефона</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" id="" class="order-input" value="{{auth()->user()->email}}">
                                            <label class="input-label">Email</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <h4 class="p-card__header">Адрес доставки</h4>
                                    <div class="input-wrapper">
                                        <div class="form-group">
                                            <input type="text" name="city" id="" class="order-input" required value="{{auth()->user()->contactInformation?->city}}">
                                            <label class="input-label">Город</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="street" id="" class="order-input" required value="{{auth()->user()->contactInformation?->street}}">
                                            <label class="input-label">Улица</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" name="home" id="" class="order-input" required value="{{auth()->user()->contactInformation?->home}}">
                                            <label class="input-label">Дом</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" name="flat" id="" class="order-input" required value="{{auth()->user()->contactInformation?->flat}}">
                                            <label class="input-label">Квартира</label>
                                        </div>

                                        <div class="form-group">
                                            <input type="number" name="index" id="" class="order-input" required value="{{auth()->user()->contactInformation?->index}}">
                                            <label class="input-label">Индекс</label>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <h4 class="p-card__header">Комментарий к заказу</h4>
                                    <div class="input-wrapper">
                                        <div class="form-group">
                                            <textarea name="comment" rows="10" class="w-100 order-input"></textarea>
                                        </div>
                                    </div>
                                </fieldset>

                                <button type="submit" class="btn btn-black w-100">Оформить заказ</button>
                            </form>
                        @else
                            <p>
                                <a href="{{ route('login') }}" class="link">Войдите</a> или <a href="{{ route('register') }}" class="link">зарегистрируйтесь</a>, чтобы оформить заказ
                            </p>
                        @endif
                    </div>
            </div>

            <div class="col-3">
                <div class="p-card">
                    <p class="total-count">Итог: {{ number_format($total, 0, '', ' ')}} ₽</p>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     document.getElementById('btn__plus').addEventListener('click', function () {
        //         let productId = this.getAttribute('data-id');
        //         let inputElement = document.getElementById('product');
        //         let currentValue = parseInt(inputElement.value);
        //         let maxQuantity = parseInt(inputElement.getAttribute('max'));
        //
        //         if (currentValue < maxQuantity) {
        //             currentValue++;
        //             inputElement.value = currentValue;
        //             updateCart(productId, currentValue);
        //         }
        //     });
        // });

        // function updateCart(productId, quantity) {
        //     // Отправляем AJAX запрос на сервер для обновления корзины
        //     axios.post('/cart/update', {
        //         product_id: productId,
        //         quantity: quantity
        //     })
        //         .then(function (response) {
        //             // Обработка успешного ответа от сервера
        //             let inputElement = document.getElementById('product');
        //             inputElement.value = quantity;
        //             console.log(inputElement.value);
        //         })
        //         .catch(function (error) {
        //             // Обработка ошибок
        //             console.error('Произошла ошибка:', error);
        //         });
        // }

        // Находим кнопки и инпут
        let btnsPlus = document.querySelectorAll('.btn__plus');
        let btnsMin = document.querySelectorAll('.btn__min');
        let inputs = document.querySelectorAll('.product_input');


        // На каждую кнопку плюс добавляем слушатель на клик
        btnsPlus.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                // Находим ближнего родителя к кнопке, а в нем находим инпут
                let input = btn.closest('.product__count').querySelector('.product_input');
                //Функция с параметрами
                addCount('plus', btn.dataset.id, input);
            })
        })

        btnsMin.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                let input = btn.closest('.product__count').querySelector('.product_input');
                addCount('min', btn.dataset.id, input);
            })
        })

        //Функция в которой принимаем параметры
        function addCount(operation, productId, input) {
            //Принимаем из массива благодаря id элемент который нужен
            axios.get(`/cart/get/${productId}`)
                .then(function (response) {
                    //Получение количества товара с сессии, из массива данных товара
                    let quantity = response.data.quantity;
                    //Проверка на минимальное число
                    if (quantity === 1 && operation === 'min') {
                        return;
                    }
                    //Проверка на максимальное число
                    if (parseInt(input.dataset.max) === parseInt(quantity) && operation === 'plus') {
                        return;
                    }
                    //Если операция плюс, увеличиваем на 1 и ставим новое значение в инпут
                    if (operation === 'plus') {
                        quantity++;
                        input.value = quantity;
                        //Если операция минус, уменьшаем на 1 и ставим новое значение в инпут
                    } else if (operation === 'min') {
                        quantity--;
                        input.value = quantity;
                    }
                    //Обновляем корзину
                    axios.post(`/cart/operation/${productId}`, {
                        operation: operation
                        //Обновляем страницу браузера
                    }).then(() => {
                        location.reload();
                    });
                });
        }


        // let productId = document.getElementById('product').getAttribute('data-id');
        // let btnPlus = document.getElementById('btn__plus');
        // let input = document.getElementById('product');
        // console.log(btnPlus);
        // console.log(productId);
        // console.log(input);
        //
        // btnPlus.addEventListener('click', function () {
        //     input.value ++;
        // });
        // var quantityInput = document.getElementById('quantity_' + productId);
        // var currentValue = parseInt(quantityInput.value);
        // console.log(quantityInput);
        // console.log(currentValue);
        // function updateQuantity(productId, change) {
        //
        //     if (change === 1) {
        //         // Увеличиваем значение на 1
        //         quantityInput.value = currentValue + 1;
        //         console.log(quantityInput)
        //         console.log(quantityInput.value)
        //     } else if (change === -1 && currentValue > 1) {
        //         // Уменьшаем значение на 1, не допуская отрицательных значений
        //         quantityInput.value = currentValue - 1;
        //         console.log(quantityInput.value)
        //     }
        // }
    </script>
@endsection
