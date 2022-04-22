@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="eventDetail">
            @include('partials.eventInfo', $event)

            <div class="eventDetailNominations">
                <div class="eventDetailNominations-data">
                    <h2 class="eventDetailNominations__title">Номинации</h2>

                    <div class="eventDetailNominations__links">
                        @foreach ($nominations as $nomination)
                    
                        <a  class="eventDetailNominations__link"
                            href="{{ route('event_nomination', [
                            'id' => $event -> id, 
                            'id_nomination' => $nomination -> id
                            ]) }}">{{ $nomination -> nomination_name }}</a>
    
                    @endforeach
                    </div>
                </div>

                @if (auth("web")->id() == $event->id_user || auth('admin')->check())
                    <form action="{{ route('addNomination_process') }}" class="eventDetail__form" method="POST">
                        @csrf

                        <h2 class="eventDetail__form-title">Добавить номинацию</h2>

                        <div class="eventDetail__form-group">
                            <input type="text" class="eventDetail__form-input" name="nomination_name" placeholder="Название номинации">
                            <input type="text" class="eventDetail__form-idHiddenInput" name="id_event" value="{{ $event -> id }}" hidden>
                        </div>
                        
                        <button type="submit" class="eventDetail__form-submit">Добавить</button>
                    </form> 
                @endif
            </div>
            
            <div class="eventDetailResults flexReverse">
                <div class="eventDetailResults__data">
                    <h2 class="eventDetailResults__title">Виды наградных документов</h2>

                    <div class="eventDetailResults__items">
                        @foreach ($results as $result)
                        @if ($result -> result_name != 'Результаты не подведены')
                            <p class="eventDetailResults__name">{{ $result -> result_name }}</p>
                        @endif
                    @endforeach
                    </div>
                </div>
    
                @if (auth("web")->id() == $event->id_user || auth('admin')->check())
                    <form action="{{ route('addResult_process') }}" class="eventDetail__form" method="POST">
                        @csrf   
                        <h2 class="eventDetail__form-title">Добавить вид наградного документа</h2>

                        <input type="text" name="id_event" value="{{ $event -> id }}" hidden>

                        <div class="eventDetail__form-group">
                            <label for="result_name" class="eventDetail__form-label">Введите название наградного документа:</label>
                            <input type="text" class="eventDetail__form-input" name="result_name" placeholder="Название наградного документа">
                        </div>

                        <div class="eventDetail__form-group">
                            <label for="id_result_type" class="eventDetail__form-label">Выберите тип наградного документа</label>
                            <select class="eventDetail__form-input" name="id_result_type" id="">
                                @foreach ($result_types as $result_type)
                                    <option value="{{ $result_type -> id }}">{{ $result_type -> result_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="eventDetail__form-submit">Добавить</button>
                    </form> 
                @endif
            </div>
        </div>
    </div>
@endsection
