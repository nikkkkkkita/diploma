@extends('layouts.main')

@section('title')
    Мои заявки
@endsection

@section('content')
    <div class="container mt-5 row">
        @include('includes.user_menu')
       <div class="col">
           <h2>Мои заявки</h2>
           @if(session('success'))
               <div class="alert alert-success mt-2 mb-2">
                   {{ session('success') }}
               </div>
           @endif
           @if($errors->any())
               <ul class="alert alert-danger mt-2 mb-2">
                   @foreach($errors->all() as $error)
                       <li class="mb-1">{{$error}}</li>
                   @endforeach
               </ul>
           @endif
           @if(!$application)
{{--               <p>Вы еще не подавали заявку на создание магазина</p>--}}
{{--               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applicationModal">--}}
{{--                   Создать заявку--}}
{{--               </button>--}}
{{--               <a href="{{ route('user.application.create') }}">Создать заявку</a>--}}
               <div class="p-card mt-3 mb-5">
                   <h4 class="p-card__header mb-3">Заявка на создание магазина</h4>
                   <p class="p-card__title mb-3">Вы еще не подавали заявку на создание магазина, создайте ее и наш администратор рассмотрит ее</p>
                   <div class="p-card__btn">
                       <button type="button" class="btn btn-black w-100" data-bs-toggle="modal" data-bs-target="#applicationModal">Создать заявку</button>
                   </div>
               </div>
           @else
               <table class="table">
                   <thead>
                   <tr>
                       <th>Название магазина</th>
                       <th>Описание</th>
                       <th>Статус заявки</th>
                   </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>{{ $application->name }}</td>
                           <td>{{ $application->description }}</td>
                           <td>{{\App\Enums\StatusEnum::getStatusName(\App\Enums\StatusEnum::from($application->status))}}</td>
                       </tr>
                   </tbody>
               </table>

           @endif
       </div>

        <!--Модальное окно-->
        <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="applicationModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="applicationModal">Заявка</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('user.application.store', Auth::user()) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Название магазина</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="description">Описание магазина</label>
                                <textarea class="form-control" id="description" name="description" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-black mt-3 w-100">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
