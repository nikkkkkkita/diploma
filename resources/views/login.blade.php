@extends('layouts.main')

@section('title')
    Вход
@endsection

@section('content')
    <style>
        main {
            background-color: rgba(249, 249, 249, 1);
        }
    </style>
    <div class="container row d-flex align-items-center">
        <div class="errors">
            @if($errors -> any())
                <ul class="alert alert-danger mt-2 mb-2">
                    @foreach($errors->all() as $error)
                        <li class="mb-1">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="card-section">
            <div class="card-section_img">
                <img src="{{ asset('image/login_img.png') }}" alt="Свеча" class="card-section_img-img">
            </div>

            <div class="card-section_inputs">
                <div class="inputs-form">
                    <div class="form_heading">
                        <h2>Войдите в аккаунт</h2>
                        <a href="{{ route('register') }}" class="link">Регистрация</a>
                    </div>

                    <div class="form_body">
                        <form action="{{route('auth')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}" autofocus>
                                <label class="input-label">Логин</label>
                            </div>

                            <div class="form-group">

                                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                                <label class="input-label">Пароль</label>
                            </div>

                            @if(session('error'))
                                <div class="card-section-error">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="form_bottom">
                                <button type="submit" class="btn btn-black w-100 btn-arrow">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">


        </div>
        {{--        <div class="col ms-5">--}}
        {{--            <img src="{{ asset('image/log_reg_img.jpg') }}" alt="Свеча" class="w-100 rounded-2">--}}
        {{--        </div>--}}
    </div>
@endsection
