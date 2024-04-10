@extends('layouts.main')

@section('title')
    Регистрация
@endsection

@section('content')
    <style>
        main {
            background-color: rgba(249, 249, 249, 1);
        }
    </style>
    <div class="container row d-flex align-items-center">
            <div class="card-section">
                <div class="card-section_img">
                    <img src="{{ asset('image/reg_img.png') }}" alt="Диффузор" class="card-section_img-img">
                </div>

                <div class="card-section_inputs">
                    <div class="inputs-form">
                        <div class="form_heading">
                            <h2>Регистрация</h2>
                            <a href="{{ route('login') }}" class="link">Войти</a>
                        </div>

                        <div class="form_body">
                            <form action="{{route('registration')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" id="fullName" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                    <label class="input-label">Имя</label>
                                </div>

                                <div class="card-section-error">
                                    @error('first_name')
                                        {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="fullName" name="last_name" value="{{ old('last_name') }}" required >
                                    <label class="input-label">Фамилия</label>
                                </div>

                                <div class="card-section-error">
                                    @error('last_name')
                                    {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="fullName" name="patronymic" value="{{ old('patronymic') }}" >
                                    <label class="input-label">Отчество</label>
                                </div>

                                <div class="card-section-error">
                                    @error('patronymic')
                                    {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" id="login" name="login" value="{{ old('login') }}" required>
                                    <label class="input-label">Логин</label>
                                </div>

                                <div class="card-section-error">
                                    @error('login')
                                    {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    <label class="input-label">Email</label>
                                </div>

                                <div class="card-section-error">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                                    <label class="input-label">Пароль</label>
                                </div>

                                <div class="card-section-error">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </div>


                                <div class="form_bottom">
                                    <button type="submit" class="btn btn-black w-100 btn-arrow">Зарегистрироваться</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
