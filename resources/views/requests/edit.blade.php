@extends('layouts.app')

@section('title', "Редактирование заявки")

@section('content')

    @include('partials.header')

    <div class="container">
        <div class="eventDetailWithNomination">

            <div class="editRequest">
                <div class="editRequest__title">
                    <h1 class="editRequest__info">Мероприятие: "{{ $request -> stage -> nomination -> event -> event_name}}"</h1>
                    <h1 class="editRequest__info">Номинация: "{{ $request -> stage -> nomination -> nomination_name }}"</h1>
                    <h1 class="editRequest__info">Этап: "{{ $request -> stage -> event_stage_name }}"</h1>
                    <h1 class="editRequest__info">Редактирование участия студента "{{ $request -> student -> student_name }} {{ $request -> student -> student_surname }}":</h1>
                    
                </div>

                <form action="{{ route('stageRequests.update', [
                    'id' => $event -> id, 
                    'id_nomination' => $nomination -> id, 
                    'id_stage' => $stage -> id,
                    'id_request' => $request -> id ]) }}"
                    method="post" 
                    class="editRequest__form">
                    @csrf
                    @method('PUT')

                    <input type="text" name="id_student" value="{{ $request -> student -> id }} " hidden>

                    <div class="editRequest__group">
                        <select name="id_result" id="" class="editRequest__select">
                            @foreach ($results as $result)
                                @if ($request -> result -> id == $result -> id)
                                    <option value="{{ $result -> id }}" class="editRequest__option" selected>Результат студента - {{ $result -> result_name }}</option>
                                @else
                                    <option value="{{ $result -> id }}" class="editRequest__option">{{ $result -> result_name }}</option>
                                @endif                                    
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="editRequest__submit">Редактировать</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/js/table2excel.js') }}"></script>

    <script>
        document.querySelector('.curentStage__downloadBtn').addEventListener('click', function(){
            var table2excel = new Table2Excel();
            table2excel.export(document.querySelectorAll(".curentStage__table"));
        })
    </script>
@endsection
