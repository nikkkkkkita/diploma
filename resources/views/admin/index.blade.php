@extends('layouts.main')

@section('title')
    Заявки
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Список заявок</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Имя пользователя</th>
                <th>Название магазина</th>
                <th>Описание магазина</th>
                <th>Статус</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($applications as $application)
                <tr>
                    <td>{{ $application->user->fullName }}</td>
                    <td>{{ $application->name }}</td>
                    <td>{{ $application->description }}</td>
                    <td>
                        {{\App\Enums\StatusEnum::getStatusName(\App\Enums\StatusEnum::from($application->status))}}
                    </td>
                    <td>
                        @if($application->status == 'new')
                            <form action="{{ route('admin.application.update', $application->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" name="status" value="{{\App\Enums\StatusEnum::ACCEPTED->value}}" class="confirm-button btn btn-success">Подтвердить</button>
                                <button type="submit" name="status" value="{{\App\Enums\StatusEnum::REJECTED->value}}" class="reject-button btn btn-danger">Отклонить</button>
                            </form>
                        @else
                            <!-- Сообщение, что действия недоступны -->
                            Недоступно
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
