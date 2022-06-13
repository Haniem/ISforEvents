@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="eventDetailWithNomination">

            
            @include('partials.eventInfo', $event)


            <div class="eventDetailStages">

                @if (auth()->check())
                    <h1 class="eventDetailStages__title">Стадии мероприятия в номинации: {{ $nomination -> nomination_name }} </h1>

                    <div class="eventDetailStages__stages">
                        @foreach ($stages as $stage)
                        <div class="eventDetailStages__group">
                            <h1 class="eventDetailStages__title">{{ $stage -> event_stage_name }}</h1>

                            <a href="{{ route('stageRequests.index', [
                                'id' => $event -> id, 
                                'id_nomination' => $nomination -> id, 
                                'id_stage' => $stage -> id ])
                                }}" class="eventDetailStages__link">Подробнее</a> 
                        </div>
                        @endforeach
                    </div>   
                @else
                    <div class="eventDetailWithNomination__notification">
                        <h1 class="eventDetailWithNomination__title">Просмотр стадий в номинации: {{ $nomination -> nomination_name }}</h1>
                        <h1 class="eventDetailWithNomination__title">доступен только авторизированным пользователям</h1>
                        <a class="eventDetailWithNomination__link" href="{{ route('login') }}">Авторизоваться</a>
                    </div> 
                @endif

                    
            </div>

            @if (auth("web")->id() == $event->id_user || auth('admin')->check())
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
            @endif
        </div>
    </div>
@endsection
