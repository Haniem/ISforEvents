@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="eventDetail">

            <div class="eventDetailInfo">

                <h1 class="eventDetailInfo__title">{{ $event -> event_name }}</h1>

                <div class="eventDetailInfo__disription">Описание: {{ $event -> event_discrtiption }}</div>
                <div class="eventDetailInfo__format">Формат проведения: {{ $event -> event_format }}</div>

                <div class="eventDetailInfo__dates">
                    <div class="eventDetailInfo__dates-begDate">Дата начала: {{ $event -> begin_date }}</div>

                    <div class="eventDetailInfo__dates-endDate">Дата окончания: {{ $event -> end_date }}</div>
                </div>

                <div class="eventDetailInfo__requirmets">

                    <div class="eventDetailInfo__requirmets-requirmets">Требования: {{ $event -> event_requirements }}</div>

                    <div class="eventDetailInfo__requirmets-age">Ограничение по возрасту:{{ $event -> event_age }}</div>

                </div>

                <div class="eventDetailInfo__type">Тип мероприятия: {{  $event -> type -> event_type_name  }}</div>
                <div class="eventDetailInfo__level">Уровень мероприятия: {{  $event -> level -> event_level_name  }}</div>
                <div class="eventDetailInfo__status">Статус мероприятия: {{  $event -> status -> event_status_name  }}</div> 
                <div class="eventDetailInfo__user">Ответственный преподаватель {{  $event -> user -> name  }} {{  $event -> user -> surname  }} {{  $event -> user -> lastname  }}</div>

            </div>

            <div class="eventDetailStages">
                <h3 class="eventDetailStages__title">Стадии мероприятия в номинации: {{ $nomination -> nomination_name }} </h3>

                @foreach ($stages as $stage)
                    <p class="eventDetailStages__title">{{ $stage -> event_stage_name }}</p>
                @endforeach
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
