@extends('layouts.app')

@section('title', 'Добавить мероприятие')

@section('content')

    @include('partials.header')
    <div class="container">

        <div class="addEvent">

            <h1 class="addEvent__title">Введите данные о мероприятие</h1>
    
            <form action="{{ route('addEvent_process') }}" method="post" class="addEvent__form">
                @csrf
                

                <div class="addEvent_inputs">

                    @error('event_name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="event_name">Название мероприятия <p class="text-danger">*</p></label>
                        <input type="text" class="addEvent__form-input" name="event_name">
                    </div>
                    
                    @error('event_discrtiption')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="event_discrtiption">Описание мероприятия<p class="text-danger">*</p></label>
                        <input type="text" class="addEvent__form-input" name="event_discrtiption">
                    </div>
                    
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="event_format">Формат проведения</label>
                        <input type="text" class="addEvent__form-input" name="event_format">  
                    </div>

                    @error('begin_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="begin_date">Дата начала мероприятия<p class="text-danger">*</p></label>
                        <input type="date" class="addEvent__form-input" name="begin_date">
                    </div>


                    @error('end_date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="end_date">Дата окончания мероприятия<p class="text-danger">*</p></label>
                        <input type="date" class="addEvent__form-input" name="end_date">
                    </div>
                    
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="event_age">Ограничение по возрасту</label>
                        <input type="text" class="addEvent__form-input" name="event_age">
                    </div>

                    @error('event_requirements')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="event_requirements">Требования <p class="text-danger">*</p></label>
                        <input type="text" class="addEvent__form-input" name="event_requirements">
                    </div>
                    

                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="event_link">Ссылка на мероприятие</label>
                        <input type="text" class="addEvent__form-input" name="event_link">
                    </div>

                    @error('id_event_type')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="id_event_type">Тип мероприятия <p class="text-danger">*</p></label>
                        <select name="id_event_type" id="">
                            <option value=""></option>
                            @foreach ($event_types as $event_type)
                                <option value="{{ $event_type -> id }}">{{ $event_type -> event_type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('id_event_level')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="id_event_level">Уровень мероприятия <p class="text-danger">*</p></label>
                        <select name="id_event_level" id="">
                            <option value=""></option>
                            @foreach ($event_levels as $event_level)
                                <option value="{{ $event_level -> id }}">{{ $event_level -> event_level_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('id_event_status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="id_event_status">Статус мероприятия <p class="text-danger">*</p></label>
                        <select name="id_event_status" id="">
                            <option value=""></option>
                            @foreach ($event_statuses as $event_status)
                                <option value="{{ $event_status -> id }}">{{ $event_status -> event_status_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('id_user')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <div class="addEvent_inputItem">
                        <label class="addEvent__form-label" for="id_user">Ответственный преподаватель <p class="text-danger">*</p></label>
                        <select name="id_user" id="">
                            <option value=""></option>
                            @foreach ($users as $user)
                                <option value="{{ $user -> id }}">{{ $user -> name }} {{ $user -> surname }} {{ $user -> lastname }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    

                </div>

                <div class="addEvent_inputItem">
                    <label class="addEvent__form-com" for="event_com">Коментарий</label>
                    <input type="text" class="addEvent__form-comInp" name="event_com">
                </div>
                
                <button type="submit" class="addEvent__form-submit">Добавить</button>
            </form>

        </div>
        
    </div>
    
@endsection
