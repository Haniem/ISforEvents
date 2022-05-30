@extends('layouts.app')

@section('title', 'Добавить мероприятие')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1>Добавить мероприятие</h1>

            <form action="{{ route('events.store') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="event_name" class="addItemForm__label">Название</label>
                    <input type="text" name="event_name" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <label for="event_discription" class="addItemForm__label">Описание</label>
                    <input type="text" name="event_discription" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="event_format" class="addItemForm__label">Формат проведения</label>
                    <input type="text" name="event_format" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="begin_date" class="addItemForm__label">Дата начала</label>
                    <input type="date" name="begin_date" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="end_date" class="addItemForm__label">Дата окончания</label>
                    <input type="date" name="end_date" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="event_age" class="addItemForm__label">Возрастные ограничения</label>
                    <input type="text" name="event_age" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="event_requirements" class="addItemForm__label">Требования</label>
                    <input type="text" name="event_requirements" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="event_link" class="addItemForm__label">Ссылка на страницу мероприятия</label>
                    <input type="text" name="event_link" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="event_com" class="addItemForm__label">Коментарий для администратора</label>
                    <input type="text" name="event_com" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="id_event_type" id="" required>
                        <option class="addItemForm__option" value="">Тип мероприятия</option>
                        @foreach ($event_types as $event_type)
                            <option class="addItemForm__option" value="{{ $event_type -> id }}">{{ $event_type -> event_type_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="id_event_level" id="" required>
                        <option class="addItemForm__option" value="">Уровень мероприятия</option>
                        @foreach ($event_levels as $event_level)
                            <option class="addItemForm__option" value="{{ $event_level -> id }}">{{ $event_level -> event_level_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="id_event_status" id="" required>
                        <option class="addItemForm__option" value="">Статус мероприятия</option>
                        @foreach ($event_statuses as $event_status)
                            <option class="addItemForm__option" value="{{ $event_status -> id }}">{{ $event_status -> event_status_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="id_user" id="" required>
                        <option class="addItemForm__option" value="">Ответственный преподаватель</option>
                        @foreach ($users as $user)
                            <option class="addItemForm__option" value="{{ $user -> id }}">{{ $user -> name }} {{ $user -> surname }} {{ $user -> lastname }}</option>
                        @endforeach
                    </select>
                </div>

                
                <button type="submit" class="addEvent__form-submit">Добавить</button>
            </form>

        </div>
    </div>

@endsection