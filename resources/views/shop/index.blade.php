@extends('layouts.main');

@section('title')
    Магазин
@endsection

@section('content')
    <div class="container mt-5">
        <!-- Шапка -->
        <div class="row">
            <div class="col">
                <h1>Заголовок страницы</h1>
            </div>
        </div>
        <ul>
            @foreach($shops as $shop)
                <li>
                    <a href="{{route('shop.show', $shop)}}">
                        {{$shop->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
