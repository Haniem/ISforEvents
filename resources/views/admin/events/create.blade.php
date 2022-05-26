@extends('layouts.app')

@section('title', 'Редактирование мероприятия')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1>Добавить мероприятие</h1>

            <form action="{{ route('addEvent_process') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="" class="addItemForm__label"></label>
                    <input type="text" class="addItemForm__input">
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