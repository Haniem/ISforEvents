@extends('layouts.app')

@section('title', 'Добавить мероприятие')

@section('content')
    @include('partials.header')
    <div class="container">

        <div class="addEvent">
            <div class="addEvent__leftSide">
                
                <h1 class="addEvent__form-mainTitle">Введите данные о мероприятии</h1>
    
                <form action="{{ route('addEvent_process') }}" method="post" class="addEvent__form">
                    
                    <p class="addEvent__form-title">Основная информация:</p>

                    @csrf
                    <label class="addEvent__form-group" for="event_name">
                        <input type="text" class="addEvent__form-input" name="event_name" placeholder=" " id="event_name">
                        <span class="addEvent__form-label">Название мероприятия <p class="text-danger"> *</p></span>
                    </label>
                
                    <label class="addEvent__form-group" for="event_discrtiption">
                        <input type="text" class="addEvent__form-input" name="event_discrtiption"  placeholder=" " id="event_discrtiption">
                        <span class="addEvent__form-label">Описание мероприятия<p class="text-danger"> *</p></span>
                    </label>
                
                    <label class="addEvent__form-group" for="event_format">
                        <input type="text" class="addEvent__form-input" name="event_format"  placeholder=" " id="event_format">  
                        <span class="addEvent__form-label">Формат проведения</span>
                    </label>
                    
                    <label class="addEvent__form-group" for="event_age">
                        <input type="text" class="addEvent__form-input" name="event_age"  placeholder=" " id="event_age">
                        <span class="addEvent__form-label">Ограничение по возрасту</span>
                    </label>

                    <label class="addEvent__form-group" for="event_requirements">
                        <input type="text" class="addEvent__form-input" name="event_requirements" placeholder=" " id="event_requirements">
                        <span class="addEvent__form-label">Требования <p class="text-danger"> *</p></span>
                    </label>
                    
                    <label class="addEvent__form-group" for="event_link">
                        <input type="text" class="addEvent__form-input" name="event_link" placeholder=" " id="event_link">
                        <span class="addEvent__form-label">Ссылка на мероприятие</span>
                    </label>

                    <p class="addEvent__form-title">Дата начала и окончания мероприятия:</p>

                    <label class="addEvent__form-group" for="begin_date">
                        <input type="date" class="addEvent__form-input" name="begin_date"  placeholder=" " id="begin_date">
                    </label>

                    <label class="addEvent__form-group" for="end_date">
                        <input type="date" class="addEvent__form-input" name="end_date"  placeholder=" " id="end_date">
                    </label>

                    <p class="addEvent__form-title">Дополнительная информация:</p>

                    <div class="addEvent__form-select">
                        <select class="addEvent__form-input" name="id_event_type" id="" required>
                            <option value="">Тип мероприятия</option>
                            @foreach ($event_types as $event_type)
                                <option value="{{ $event_type -> id }}">{{ $event_type -> event_type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="addEvent__form-select">
                        <select class="addEvent__form-input" name="id_event_level" id="" required>
                            <option value="">Уровень мероприятия</option>
                            @foreach ($event_levels as $event_level)
                                <option value="{{ $event_level -> id }}">{{ $event_level -> event_level_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="addEvent__form-select">
                        <select class="addEvent__form-input" name="id_event_status" id="" required>
                            <option value="">Статус мероприятия</option>
                            @foreach ($event_statuses as $event_status)
                                <option value="{{ $event_status -> id }}">{{ $event_status -> event_status_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="addEvent__form-select">
                        <select class="addEvent__form-input" name="id_user" id="" required>
                            <option value="">Ответственный преподаватель</option>
                            @foreach ($users as $user)
                                <option value="{{ $user -> id }}">{{ $user -> name }} {{ $user -> surname }} {{ $user -> lastname }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <button type="submit" class="addEvent__form-submit">Добавить</button>
                </form>
            </div>

            <div class="addEvent__rightSide">
                <img src="{{ asset('public/images/MGTU_logo.png') }}" alt="Логотип МГТУ" class="addEvent__right-logo">

                @if (($errors -> first()))
                    <div class="addEvent__right-errors">
                        <p class="addEvent__right-error">Заполните обязательные поля.</p>
                        @foreach ($errors->all() as $error)
                            @if ($error == 'Такое мероприятие уже зарегестрировано.')
                                <p class="addEvent__right-error">Такое мероприятие уже зарегестрировано.</p>   
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
