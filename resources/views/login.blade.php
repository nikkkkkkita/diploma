@extends('layouts.main')

@section('title')
    Вход
@endsection

@section('content')
    <div class="container row d-flex align-items-center">
        <div class="col">
            <div class="errors">
                @if($errors -> any())
                    <ul class="alert alert-danger mt-2 mb-2">
                        @foreach($errors->all() as $error)
                            <li class="mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <div class="heading d-flex justify-content-between align-items-center mb-3">
                <h2>Войдите в аккаунт</h2>
                <a href="{{ route('register') }}" class="link-gray">Регистрация</a>
            </div>


            <form action="{{route('auth')}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" class="form-control" id="login" name="login" placeholder="Логин">
                </div>

                <div class="form-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">

                </div>

                <button type="submit" class="btn btn-black w-100 btn-arrow">Войти</button>
            </form>
        </div>
        <div class="col ms-5">
            <img src="{{ asset('image/log_reg_img.jpg') }}" alt="Свеча" class="w-100 rounded-2">
        </div>
    </div>
@endsection
