@extends('layouts.main')

@section('title', 'Каталог')

@section('content')
    <h1>Каталог</h1>
    {{\DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('catalog')}}
{{--    ссылка для меню--}}

{{--    <a href="{{route('catalog', ['category' => 'candles'])}}">Свечки</a>--}}
{{--    <a href="{{route('catalog', ['category' => 'diffusor'])}}">Диффузоры</a>--}}
    <livewire:catalog-pagination/>
@endsection
