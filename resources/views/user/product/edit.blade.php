@extends('layouts.main')

@section('title', 'Создание товара')

@section('content')
    <div class="container mt-5 row">
        @include('includes.user_menu')

        <div class="col-9">
            <h2 class="mb-3">Редактирование товара</h2>
            {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('product.edit', $product->id)}}
            @if($errors->any())
                <div class="alert alert-danger mt-2 mb-2">
                    <ul class="mb-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('product.update', $product) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="p-card mt-4">
                    <h4 class="p-card__header mb-3">Информация о товаре</h4>
                    <div class="mb-3">
                        <label class="label-req">Категория</label>
                        @foreach($categories as $category)
                            <div class="form-check">
                                <input type="radio" data-form="{{ \App\Helpers\CategoryHelper::getEnglishTag($category->name) }}" class="form-check-input radio-cat" name="category_id" id="category_{{ $category->id }}" value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'checked' : ''}}>
                                <label class="form-check-label" for="category_{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label label-req">Название товара</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label label-req">Описание</label>
                        <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="mb-3 input-container">
                            <label for="price" class="form-label label-req">Цена</label>
                            <input type="number" step="1" class="form-control" id="price" name="price" min="1" value="{{ $product->price }}" required>
                        </div>

                        <div class="mb-3 input-container">
                            <label for="count" class="form-label label-req">Кол-во товара</label>
                            <input type="number" step="1" class="form-control" id="count" name="count" min="1" value="{{ $product->count }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label label-req">Изображения</label>
                        <input type="file" class="form-control" id="image" name="image[]" multiple>
                    </div>

                    <div class="mb-3 d-flex images-wrap">
                        @foreach($product->getMedia('products') as $media)
                            <div class="img-wrap">
                                <div class="img-wrap__img">
                                    <img src="{{$media->getUrl()}}" alt="Фото товара">
                                </div>
                                <div class="img-wrap__btn">
                                    <button type="button" class="media-button btn-delete" data-id="{{$media->id}}">
                                        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 12H18" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M12 18V6" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="p-card mt-3">
                    <h4 class="p-card__header mb-3">Характеристики</h4>

                    <div class="mb-3 someclass hide" id="candle">
                        <div class="mb-3">
                            <label for="type" class="form-label">Тип свечи</label>
                            <select name="type" id="type" class="form-select">
                                @foreach($types as $type)
                                    <option value="{{ $type['value'] }}" @if($type['value'] == $product->characteristics->type) selected @endif>
                                        {{ $type['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="compound" class="form-label">Состав</label>
                            <select name="compound" id="compound" class="form-select">
                                @foreach($compositions as $composition)
                                    <option value="{{ $composition['value'] }}" @if($composition['value'] == $product->characteristics->compound) selected @endif>
                                        {{ $composition['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="wick_type" class="form-label">Тип фитиля</label>
                            <select name="wick_type" id="wick_type" class="form-select">
                                @foreach($wickTypes as $wickType)
                                    <option value="{{ $wickType['value'] }}" @if($wickType['value'] == $product->characteristics->wick_type) selected @endif>
                                        {{ $wickType['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="burning_time" class="form-label">Время горения:</label>
                            <input type="number" class="form-control" id="burning_time" name="burning_time" value="{{ $product->characteristics->burning_time }}">
                        </div>
                    </div>

                    <div class="mb-3 someclass hide" id="diffuser">
                        <div class="mb-3">
                            <label for="type_diffuser" class="form-label">Тип диффузора:</label>
                            <select name="type_diffuser" id="type_diffuser" class="form-select">
                                @foreach($diffuserTypes as $diffuserType)
                                    <option value="{{ $diffuserType['value'] }}" @if($diffuserType['value'] == $product->characteristics->type_diffuser) selected @endif>
                                        {{ $diffuserType['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="type_of_flavoring" class="form-label">Вид ароматизатора:</label>
                            <select name="type_of_flavoring" id="type_of_flavoring" class="form-select">
                                @foreach($flavoringTypes as $flavoringType)
                                    <option value="{{ $flavoringType['value'] }}" @if($flavoringType['value'] == $product->characteristics->type_of_flavoring) selected @endif>
                                        {{ $flavoringType['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="diffuser_placement" class="form-label">Размещение ароматизатора:</label>
                            <select name="diffuser_placement" id="diffuser_placement" class="form-select">
                                @foreach($diffuserPlacements as $diffuserPlacement)
                                    <option value="{{ $diffuserPlacement['value'] }}" @if($diffuserPlacement['value'] == $product->characteristics->diffuser_placement) selected @endif>
                                        {{ $diffuserPlacement['name'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="aroma" class="form-label">Аромат</label>
                        <input type="text" class="form-control" id="aroma" name="aroma" value="{{ $product->characteristics->aroma }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="mb-3 w-100">
                            <label for="height" class="form-label">Высота</label>
                            <input type="number" class="form-control" id="height" name="height" min="1" value="{{ $product->characteristics->height }}">
                        </div>

                        <div class="mb-3 w-100 ms-3 me-3">
                            <label for="volume" class="form-label">Объем</label>
                            <input type="number" class="form-control" id="volume" name="volume" min="1" value="{{ $product->characteristics->volume }}">
                        </div>

                        <div class="mb-3 w-100 ">
                            <label for="weight" class="form-label">Вес</label>
                            <input type="number" class="form-control" id="weight" name="weight" min="1" value="{{ $product->characteristics->weight }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="color" class="form-label">Цвет:</label>
                        <select name="color" id="color" class="form-select">
                            @foreach($colorNames as $color)
                                <option value="{{ $color['value'] }}" @if($color['value'] == $product->characteristics->color) selected @endif>
                                    {{ $color['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="country_of_manufacture" class="form-label">Страна производства</label>
                        <select name="country_of_manufacture" id="country_of_manufacture" class="form-select">
                            @foreach($mCountries as $mCountry)
                                <option value="{{ $mCountry['value'] }}" @if($mCountry['value'] == $product->characteristics->country_of_manufacture) selected @endif>
                                    {{ $mCountry['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-black">Изменить товар</button>
                </div>
            </form>
        </div>
    </div>

    <!--Модальное окно-->
{{--    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModal" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h1 class="modal-title fs-5" id="confirmationModal">Удалить фото?</h1>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form action="{{route('product.media.delete')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <input type="hidden" value="" name="id" id="media-input-id">--}}
{{--                        <button type="submit">Удалить</button>--}}
{{--                        <button type="button" class="btn btn-black" data-bs-dismiss="modal" aria-label="Close">Отмена</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script src="{{ asset('js/preview-product-img.js') }}"></script>

    <script>
        const deleteButtons = document.querySelectorAll('.media-button'); // Все кнопки с классом берем
        deleteButtons.forEach((button) => { //Для всех кнопок делаем цикл
            button.addEventListener('click', function (evt) { //На кнопку ставим слушатель по клику
                const id = button.dataset.id; // Берем id из аттрибута data у кнопки, который является id (фото)
                const url = `/user/product/media/${id}`; //Берем url по которому будет отправляться запрос
                axios.delete(url) //Отправляем запрос на удаление по url
                    .then(response => {
                        location.reload();
                    })
                    .catch(error => {
                        console.error(error);
                    });
            })
        })
    </script>
@endsection

