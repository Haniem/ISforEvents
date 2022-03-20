@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="eventDetail">

            
            @include('partials.eventInfo', $event)


            <div class="eventDetailStages">
                <h3 class="eventDetailStages__title">Стадии мероприятия в номинации: {{ $nomination -> nomination_name }} </h3>

                <div class="eventDetailStages__groups">

                    @foreach ($stages as $stage)
                    <div class="eventDetailStages__group-stage">

                        <p class="eventDetailStages__title">{{ $stage -> event_stage_name }}</p>

                        @foreach ($requests as $request)
                            
                            @if ($stage -> id == $request -> id_stage)
                                
                                <div class="eventDetailStages__group">

                                    <p class="eventDetailStages__group-name">Студент:{{ $request -> student -> student_name }} {{ $request -> student -> student_surname }} {{ $request -> student -> student_lastname }}</p>
                                    <p class="eventDetailStages__group-result">Релультат: {{ $request -> result -> result_name }}</p>
                                </div>

                            @endif

                        @endforeach

                        @auth('web')

                            <p class="eventDetailStages__title">Добавить студента:</p>

                            <form class="eventDetailStages__form" action="{{ route('addRequest_process') }}" method="post">
                                @csrf

                                <input type="text" name="id_stage" value="{{ $stage -> id }}" hidden>

                                <div class="eventDetailStages__form-group">
                                    <label for="id_student" class="eventDetailStages__form-label">Студент:</label>
                                    
                                    <select name="id_student" id="" class="eventDetailStages__form-input">
                                        @foreach ($students as $student)
                                            <option value="{{ $student -> id }}" class="eventDetailStages__form-input">{{ $student -> student_name }} {{ $student -> student_surname }} {{ $student -> student_lastname }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="eventDetailStages__form-group">
                                    <label for="id_result" class="eventDetailStages__form-label">Результат:</label>
                                    <select name="id_result" id="" class="eventDetailStages__form-input">
                                        @foreach ($results as $result)
                                            <option value="{{ $result -> id }}" class="eventDetailStages__form-input">{{ $result -> result_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                
                                <button type="submit" class="eventDetailAddStage__form-submit">Добавить</button>

                            </form>

                        @endauth

                    </div>

                    @endforeach

                </div>
                
            </div>

            @auth('web')
                <div class="eventDetailAddStage">
                    <h3 class="eventDetailAddStage__title">Добавить стадию</h3>
                    <form action="{{ route('addStage_process') }}" class="eventDetailAddStage__form" method="POST">

                        @csrf

                        <div class="eventDetailAddStage__form-item">
                            <label for="event_stage_name" class="eventDetailAddStage__form-label">Наименование:</label>
                            <input type="text" name="event_stage_name" class="eventDetailAddStage__form-input">
                        </div>

                        <div class="eventDetailAddStage__form-item">
                            <label for="stage_begin_date" class="eventDetailAddStage__form-label">Дата начала:</label>
                            <input type="date" name="stage_begin_date" class="eventDetailAddStage__form-input">
                        </div>

                        <div class="eventDetailAddStage__form-item">
                            <label for="stage_end_date" class="eventDetailAddStage__form-label">Дата окончания:</label>
                            <input type="date" name="stage_end_date" class="eventDetailAddStage__form-input">
                        </div>

                        <div class="eventDetailAddStage__form-item">
                            <label for="id_event_stage_type" class="eventDetailAddStage__form-label">Тип:</label>
                            <select name="id_event_stage_type" id="" class="eventDetailAddStage__form-input">
                                @foreach ($stage_types as $stage_type)
                                    <option value="{{ $stage_type -> id }}">{{ $stage_type -> stage_type_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="eventDetailAddStage__form-item">
                            <label for="id_event_stage_status" class="eventDetailAddStage__form-label">Статус:</label>
                            <select name="id_event_stage_status" id="" class="eventDetailAddStage__form-input">
                                @foreach ($stage_statuses as $stage_status)
                                    <option value="{{ $stage_status -> id }}">{{ $stage_status -> stage_status_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="eventDetailAddStage__form-item">
                            <label for="id_event_stage_format" class="eventDetailAddStage__form-label">Формат проведения:</label>
                            <select name="id_event_stage_format" id="" class="eventDetailAddStage__form-input">
                                @foreach ($stage_formats as $stage_format)
                                    <option value="{{ $stage_format -> id }}">{{ $stage_format -> stage_format_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="text" name="id_nomination" value="{{ $nomination -> id }}" hidden>

                        <button type="submit" class="eventDetailAddStage__form-submit">Добавить</button>

                    </form>
                </div> 
            @endauth


        </div>
        
    </div>
    
@endsection
