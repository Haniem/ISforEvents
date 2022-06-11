@extends('layouts.app')

@section('title', 'Список мероприятий')

@section('content')
    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <div class="adminList">
                <div class="adminList__prev">
                    <h1 class="adminList__title">Список мероприятий:</h1>
                    <a href="{{ route('events.create') }}" class="adminList__addItemLink">Добавить</a>
                </div>
                <div class="adminList__list">
                    @foreach ($events as $event)
                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $event -> event_name }}</h3>
                            <div class="adminList__dates">
                                <p class="adminList__text">c {{ $event -> begin_date }} </p>
                                <p class="adminList__text"> по {{ $event -> end_date }}</p>
                            </div>
                            <div class="adminList__group">
                                <a href="{{ route('events.edit', $event -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('events.destroy', $event -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить это мероприятие?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
