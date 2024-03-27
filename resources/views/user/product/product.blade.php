@extends('layouts.main')

@section('title', 'Все товары')

@section('content')
    <div class="container mt-5 row">
        @include('includes.user_menu')
        <div class="col-9">
            <h2>Все товары</h2>
                @if(!$products)
                <div class="p-card mt-3 mb-5">
                    <h4 class="p-card__header mb-3">Новый товар</h4>
                    <p class="p-card__title mb-3">Чтобы добавить товар, который не продается на Candela, создайте новый товар и заполните параметры</p>
                    <div class="p-card__btn">
                        <a href="{{ route('product.create') }}" class="btn btn-black w-100">Создать товар</a>
                    </div>
                </div>
                @else
            <div class="p-card mt-3 mb-5">
                <h4 class="p-card__header mb-3">Новый товар</h4>
                <p class="p-card__title mb-3">Чтобы добавить товар, который не продается на Candela, создайте новый товар и заполните параметры</p>
                <div class="p-card__btn">
                    <a href="{{ route('product.create') }}" class="btn btn-black w-100">Создать товар</a>
                </div>
            </div>
                <table class="table table-striped table-bordered rounded-3">
                <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Тип</th>
                    <th>Описание</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            <img src="{{$product->getFirstMediaUrl('products')}}" class="rounded-2 object-fit-cover" width="100px" height="100px">
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <span class="product-description">
                                {{ $product->description }}
                            </span>
                        </td>
                        <td>{{ $product->price }} ₽</td>
                        <td>
                            <div class="actions d-flex justify-content-around align-items-center" style="width: 5rem">
                                <a href="{{ route('product.edit', $product) }}" class="btn-edit">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.26 3.59997L5.04997 12.29C4.73997 12.62 4.43997 13.27 4.37997 13.72L4.00997 16.96C3.87997 18.13 4.71997 18.93 5.87997 18.73L9.09997 18.18C9.54997 18.1 10.18 17.77 10.49 17.43L18.7 8.73997C20.12 7.23997 20.76 5.52997 18.55 3.43997C16.35 1.36997 14.68 2.09997 13.26 3.59997Z"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11.89 5.05005C12.32 7.81005 14.56 9.92005 17.34 10.2"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3 22H21"  stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>

                                <a href="{{ route('product.show', $product) }}" class="link-underline link-underline-opacity-0 link-dark">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.58 12C15.58 13.98 13.98 15.58 12 15.58C10.02 15.58 8.42004 13.98 8.42004 12C8.42004 10.02 10.02 8.42004 12 8.42004C13.98 8.42004 15.58 10.02 15.58 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 20.27C15.53 20.27 18.82 18.19 21.11 14.59C22.01 13.18 22.01 10.81 21.11 9.39997C18.82 5.79997 15.53 3.71997 12 3.71997C8.46997 3.71997 5.17997 5.79997 2.88997 9.39997C1.98997 10.81 1.98997 13.18 2.88997 14.59C5.17997 18.19 8.46997 20.27 12 20.27Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>

                                </a>

                                <form action="{{ route('product.delete', $product) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-transparent border-0 btn-delete">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 5.97998C17.67 5.64998 14.32 5.47998 10.98 5.47998C9 5.47998 7.02 5.57998 5.04 5.77998L3 5.97998"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.5 4.97L8.72 3.66C8.88 2.71 9 2 10.69 2H13.31C15 2 15.13 2.75 15.28 3.67L15.5 4.97"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M18.85 9.14001L18.2 19.21C18.09 20.78 18 22 15.21 22H8.79002C6.00002 22 5.91002 20.78 5.80002 19.21L5.15002 9.14001" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M10.33 16.5H13.66"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.5 12.5H14.5"  stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>

                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @endif
        </div>

@endsection
