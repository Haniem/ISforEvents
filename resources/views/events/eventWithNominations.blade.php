@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="eventDetailWithNomination">

            
            @include('partials.eventInfo', $event)


            <div class="eventDetailStages">
                <h1 class="eventDetailStages__title">Стадии мероприятия в номинации: {{ $nomination -> nomination_name }} </h1>

                <div class="eventDetailStages__groups">
                    @foreach ($stages as $stage)
                    <div class="eventDetailStages__group-stage">
                        <h1 class="eventDetailStages__groups-title">{{ $stage -> event_stage_name }}</h1>

                        @foreach ($requests as $request)
                            @if ($stage -> id == $request -> id_stage)                   
                                <div class="eventDetailStages__group">

                                    <p class="eventDetailStages__group-name">Студент: {{ $request -> student -> student_name }} {{ $request -> student -> student_surname }} {{ $request -> student -> student_lastname }}</p>
                                    <p class="eventDetailStages__group-result">Релультат: {{ $request -> result -> result_name }}</p>
                                </div>
                            @endif
                        @endforeach

                        @auth('web')


                            <form class="eventDetail__form addStudent" action="{{ route('addRequest_process') }}" method="post">
                                @csrf

                                <h1 class="eventDetail__form-title">Добавить студента:</h1>

                                <input type="text" name="id_stage" value="{{ $stage -> id }}" hidden>

                                <div class="eventDetail__form-group">
                                    <label for="id_student" class="eventDetail__form-label">Студент:</label>       
                                    <select name="id_student" id="" class="eventDetail__form-input">
                                        @foreach ($students as $student)
                                            <option value="{{ $student -> id }}" class="eventDetail__form-input">{{ $student -> student_name }} {{ $student -> student_surname }} {{ $student -> student_lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="eventDetail__form-group">
                                    <label for="id_result" class="eventDetail__form-label">Результат:</label>
                                    <select name="id_result" id="" class="eventDetail__form-input">
                                        @foreach ($results as $result)
                                            <option value="{{ $result -> id }}" class="eventDetail__form-input">{{ $result -> result_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <button type="submit" class="eventDetail__form-submit">Добавить</button>

                            </form>
                        @endauth
                    </div>
                    @endforeach
                </div>       
            </div>

            @auth('web')
                <form action="{{ route('addStage_process') }}" class="eventDetail__form addStageForm" method="POST">

                    <h1 class="eventDetail__form-title">Добавить стадию</h1>
                    @csrf

                    <div class="eventDetail__form-group">
                        <label for="event_stage_name" class="eventDetail__form-label">Наименование:</label>
                        <input type="text" name="event_stage_name" class="eventDetail__form-input">
                    </div>

                    <div class="eventDetail__form-group">
                        <label for="stage_begin_date" class="eventDetail__form-label">Дата начала:</label>
                        <input type="date" name="stage_begin_date" class="eventDetail__form-input" min="{{ $event -> begin_date }}" max="{{ $event -> end_date }}">
                    </div>

                    <div class="eventDetail__form-group">
                        <label for="stage_end_date" class="eventDetail__form-label">Дата окончания:</label>
                        <input type="date" name="stage_end_date" class="eventDetail__form-input" min="{{ $event -> begin_date }}" max="{{ $event -> end_date }}">
                    </div>

                    <div class="eventDetail__form-group">
                        <label for="id_event_stage_type" class="eventDetail__form-label">Тип:</label>
                        <select name="id_event_stage_type" id="" class="eventDetail__form-input">
                            @foreach ($stage_types as $stage_type)
                                <option value="{{ $stage_type -> id }}">{{ $stage_type -> stage_type_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="eventDetail__form-group">
                        <label for="id_event_stage_status" class="eventDetail__form-label">Статус:</label>
                        <select name="id_event_stage_status" id="" class="eventDetail__form-input">
                            @foreach ($stage_statuses as $stage_status)
                                <option value="{{ $stage_status -> id }}">{{ $stage_status -> stage_status_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="eventDetail__form-group">
                        <label for="id_event_stage_format" class="eventDetail__form-label">Формат проведения:</label>
                        <select name="id_event_stage_format" id="" class="eventDetail__form-input">
                            @foreach ($stage_formats as $stage_format)
                                <option value="{{ $stage_format -> id }}">{{ $stage_format -> stage_format_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="text" name="id_nomination" value="{{ $nomination -> id }}" hidden>

                    <button type="submit" class="eventDetail__form-submit">Добавить</button>

                </form>
            @endauth


        </div>
        
    </div>
    
@endsection
