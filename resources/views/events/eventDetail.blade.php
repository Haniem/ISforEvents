@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="eventDetail">

            
            @include('partials.eventInfo', $event)


            <div class="eventDetailNominations">
                <h2 class="eventDetailNominations__title">Номинации</h2>
                @foreach ($nominations as $nomination)
                
                    <a  class="eventDetailNominations__link"
                        href="{{ route('event_nomination', [
                        'id' => $event -> id, 
                        'id_nomination' => $nomination -> id
                        ]) }}">{{ $nomination -> nomination_name }}</a>

                @endforeach
            </div>

            <div class="eventDetailResults">
                <h2 class="eventDetailResults__title">Виды наградных документов</h2>
                @foreach ($results as $result)
                
                    <p class="eventDetailResults__name">{{ $result -> result_name }}</p>

                @endforeach
            </div>

            @auth('web')

                <div class="eventDetailAddNomination">


                    <form action="{{ route('addNomination_process') }}" class="eventDetail__form" method="POST">
                        @csrf

                        <h2 class="eventDetailAddNomination__title">Добавить номинацию</h2>

                        <div class="eventDetail__form-group">
                            <input type="text" class="eventDetail__form-input" name="nomination_name" placeholder="Название номинации">
                            <input type="text" name="id_event" value="{{ $event -> id }}" hidden>
                        </div>
                        
                        <button type="submit" class="eventDetailAddNomination__form-submit">Добавить</button>
                    </form> 

                    

                </div>

                <div class="eventDetailAddResult">

                    <form action="{{ route('addResult_process') }}" class="eventDetail__form" method="POST">
                        @csrf   
                        
                        <h2 class="eventDetailAddNomination__title">Добавить вид наградного документа</h2>

                        <input type="text" name="id_event" value="{{ $event -> id }}" hidden>

                        <div class="eventDetail__form-group">
                            <label for="result_name" class="eventDetail__form-label">Введите название наградного документа:</label>
                            <input type="text" class="eventDetail__form-input" name="result_name">
                        </div>

                        <div class="eventDetail__form-group">
                            <label for="id_result_type" class="eventDetail__form-label">Выберите тип наградного документа</label>
                            <select name="id_result_type" id="">
                                @foreach ($result_types as $result_type)
                                    <option value="{{ $result_type -> id }}">{{ $result_type -> result_type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <button type="submit" class="eventDetailAddNomination__form-submit">Добавить</button>
                    </form> 

                </div>

            @endauth


        </div>
        
    </div>
    
@endsection
