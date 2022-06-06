@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">
        <div class="eventDetailWithNomination">

            @include('partials.eventInfo', $event)

            <div class="curentStage">

                <div class="curentStage__group">
                    <h1 class="curentStage__title">Стадия: {{ $stage -> event_stage_name }}</h1>
                    <button class="curentStage__downloadBtn">Экспортировать в эксэль документ</button>
                </div>

                <table class="curentStage__table">
                    <thead class="curentStage__thead">
                        <tr class="curentStage__tr">
                            <td class="curentStage__td">Даты проведения:</td>
                            <td class="curentStage__td">ПК/ПЦК:</td>
                            <td class="curentStage__td">Отделение:</td>
                            <td class="curentStage__td">Специальность:</td>
                            <td class="curentStage__td">Группа:</td>
                            <td class="curentStage__td">Студент:</td>
                            <td class="curentStage__td">Уровень мероприятия</td>
                            <td class="curentStage__td">Вид мероприятия</td>
                            <td class="curentStage__td">Название мероприятия</td>
                            <td class="curentStage__td">Название направления(номинация):</td>
                            <td class="curentStage__td">Место проведения:</td>
                            <td class="curentStage__td">Дата:</td>
                            <td class="curentStage__td">Результат</td>
                            <td class="curentStage__td">Ответственный преподаватель:</td>
                        </tr>
                    </thead>

                    <tbody class="curentStage__tbody">
                        @foreach ($requests as $request)
                        <tr class="curentStage__tr">
                            <td class="curentStage__td">с {{ $request -> stage -> stage_begin_date }} до {{ $request -> stage -> stage_end_date }}</td>
                            <td class="curentStage__td"></td>
                            <td class="curentStage__td">{{ $request -> student -> department }}</td>
                            <td class="curentStage__td"></td>
                            <td class="curentStage__td">{{ $request -> student -> group_name }}</td>
                            <td class="curentStage__td">{{ $request -> student -> student_name }} {{ $request -> student -> student_surname }}</td>
                            <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> level -> event_level_name }}</td>
                            <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> type -> event_type_name }}</td>
                            <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> event_name }}</td>
                            <td class="curentStage__td">{{ $request -> stage -> nomination -> nomination_name }}</td>
                            <td class="curentStage__td"></td>
                            <td class="curentStage__td"></td>
                            <td class="curentStage__td">{{ $request -> result -> result_name }}</td>
                            <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> user -> name }} {{ $request -> stage -> nomination -> event -> user -> surname }} {{ $request -> stage -> nomination -> event -> user -> lastname }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
