@extends('layouts.app')

@section('title', 'Редактирование мероприятия')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            @include('admin.partials.eventInfo', $event)

            <form class="editItemForm" action="{{ route('events.update', $event->id) }}" method="POST">
                @method("PUT")
                @csrf

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Название мероприятия</label>
                    <input 
                    name="event_name" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event -> event_name }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Описание</label>
                    <input 
                    name="event_discription" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event -> event_discrtiption }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Формат проведения</label>
                    <input 
                    name="event_format" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event ->  event_format}}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Дата начала</label>
                    <input 
                    name="begin_date" 
                    type="date" 
                    class="editItemForm__input" 
                    value="{{ $event ->  begin_date}}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Дата окончания</label>
                    <input 
                    name="end_date" 
                    type="date" 
                    class="editItemForm__input" 
                    value="{{ $event ->  end_date}}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Ограничение по возрасту</label>
                    <input 
                    name="event_age" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event -> event_age }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Требования</label>
                    <input 
                    name="event_requirements" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event -> event_requirements }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Ссыллка на мероприятие</label>
                    <input 
                    name="event_link" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event -> event_link }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Тип мероприятия</label>
                    <select name="id_event_type" id="" class="editItemForm__input">
                        @foreach ($event_types as $key=>$event_type)

                            @if ($event -> id_event_type == $event_type -> id)
                                <option value="{{ $event_type -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $event_type -> event_type_name }}</option>
                            @else 
                                <option value="{{ $event_type -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $event_type -> event_type_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Уровень мероприятия</label>
                    <select name="id_event_level" id="" class="editItemForm__input">
                        @foreach ($event_levels as $key=>$event_level)

                            @if ($event -> id_event_level == $event_level -> id)
                                <option value="{{ $event_level -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $event_level -> event_level_name }}</option>
                            @else 
                                <option value="{{ $event_level -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $event_level -> event_level_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Статус мероприятия</label>
                    <select name="id_event_status" id="" class="editItemForm__input">
                        @foreach ($event_statuses as $key=>$event_status)

                            @if ($event -> id_event_status == $event_status -> id)
                                <option value="{{ $event_status -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $event_status -> event_status_name }}</option>
                            @else 
                                <option value="{{ $event_status -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $event_status -> event_status_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label">Ответственный преподаватель</label>
                    <select name="id_user" id="" class="editItemForm__input">
                        @foreach ($event_users as $key=>$event_user)

                            @if ($event -> id_user == $event_user -> id)
                                <option value="{{ $event_user -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $event_user -> name }} {{ $event_user -> surname }} {{ $event_user -> lastname }}</option>
                            @else 
                                <option value="{{ $event_user -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $event_user -> name }} {{ $event_user -> surname }} {{ $event_user -> lastname }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                

                <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>


                <a href="{{ route('events.index')}}" class="goBackLink">Назад</a></div>


            </form>
        </div>
    </div>

@endsection