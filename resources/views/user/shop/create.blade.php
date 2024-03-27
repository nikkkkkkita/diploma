@extends('layouts.main')

@section('title', 'Настройка магазина')

@section('content')
    <div class="container mt-5 row">
        @include('includes.user_menu')

        <div class="col-9">
            <h2 class="mb-3">Создание магазина</h2>



            @if($errors->any())
                <div class="alert alert-danger mt-2 mb-2">
                    <ul class="mb-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('user.shop.store') }}" id="externalForm" enctype="multipart/form-data" id="createShopForm">
                @csrf

                <div class="p-card mt-4">
                    <h4 class="p-card__header mb-3">Информация о магазине</h4>
                    <div class="mb-3">
                        <label class="label-req">Название магазина</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="label-req">Описание</label>
                        <textarea name="description" id="description" class="form-control" required></textarea>
                    </div>
                </div>

                <div class="p-card mt-4">
                    <h4 class="p-card__header mb-3">Изображения</h4>

                    <div class="page_block mb-4">
                        <div class="shop-cover">
                            <div class="shop-cover__img" style="background-image: "></div>
                        </div>
                        <div class="shop-info">
                            <div class="shop-info__avatar">
                                <img src="" alt="Аватар" class="img-fluid rounded-circle shop-avatar">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="label-req">Аватар</label>
                        {{--                        <input type="file" name="avatar" id="avatar" class="form-control" onchange="download(this)">--}}
                        <input type="file" name="avatar" id="avatar" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="label-req">Обложка</label>
                        {{--                        <input type="file" name="header" id="header" class="form-control" onchange="download(this)">--}}
                        <input type="file" name="header" id="header" class="form-control">
                    </div>
                </div>

                <div class="p-card mt-4">
                    <h4 class="p-card__header mb-3">Ссылки на соц. сети</h4>

                    <div class="form-group" id="social-links-container">

{{--                            @for($i = 0; $i < count($shop->socialLinks); $i++)--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="col-1">--}}
{{--                                        <select name="social_links[{{$i}}][social_type_id]" id="" class="form-control mb-1">--}}
{{--                                            <option value="{{$shop->socialLinks[$i]->socialType->id}}">{{$shop->socialLinks[$i]->socialType->name}}</option>--}}
{{--                                        </select>--}}
{{--                                        <input type="text" name="social_links[0][link]" class="form-control" placeholder="Social Link">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endfor--}}
                        <div class="social-link">
                            <select name="social_links[0][social_type_id]" id="" class="form-control mb-1">
                                @php
                                    $socialTypes = \App\Models\SocialType::all();
                                @endphp
                                @foreach ($socialTypes as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                            <input type="text" name="social_links[0][link]" class="form-control mb-3" placeholder="Ссылка">
                        </div>
                    </div>
{{--                    <input type="hidden" id="social_links_count" value="{{count($shop->socialLinks)}}">--}}
                    <button type="button" class="btn btn-black" id="add-social-link">Добавить соц. сеть</button>
                    <button type="submit" class="btn btn-black mt-3 w-100" id="externalFormButton">Создать магазин</button>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var socialLinkIndex = 1;

                    document.getElementById('add-social-link').addEventListener('click', function() {
                        var socialLinkContainer = document.getElementById('social-links-container');
                        var socialLinkDiv = document.createElement('div');
                        socialLinkDiv.className = 'social-link';

                        socialLinkDiv.innerHTML = `
                <select name="social_links[${socialLinkIndex}][social_type_id]" class="form-control mb-1">
                    @foreach ($socialTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                        </select>
                        <input type="text" name="social_links[${socialLinkIndex}][link]" class="form-control mb-3" placeholder="Ссылка">
            `;

                        socialLinkContainer.appendChild(socialLinkDiv);
                        socialLinkIndex++;
                    });
                });
            </script>

            @endsection

            @section('scripts')
                <script src="{{ asset('js/preview.js') }}"></script>
@endsection
