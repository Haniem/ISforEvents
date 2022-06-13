@extends('layouts.app')

@section('title', "Список заявок")

@section('content')

    @include('partials.header')

    <div class="container">
        <div class="eventDetailWithNomination">
            @include('partials.eventInfo', $event)

            <div class="curentStageItems">
                <div class="curentStageItems__stageDelete">

                    @auth('admin')
                        <h3 class="adminLogined">Администратор авторизирован</h3>
                    @endauth

                    <p class="curentStageItems__deleteTitle">Если вы по ошибке добавили эту стадию, вы можете удалить ее:</p>
                    
                    <form action="{{ route('stages.destroy', [
                        'id' => $event -> id, 
                        'id_nomination' => $nomination -> id, 
                        'id_stage' => $stage -> id])}}" method="post">
                        @csrf
                        @method('delete')

                        <button 
                        type="submit" 
                        class="curentStageItems__deleteLink"
                        onclick="return confirm('Вы точно хотите удалить эту заявку?')">Удалить</button>
                    </form>            
                </div>

                <div class="curentStage__Messages">
                    @if(session()->get('studentAlreadyEngage'))
                        <h1 class="curentStage__errorMessage">Студент уже учавствует в этапе!</h1>
                    @endif
                    @if(session()->get('requestCreated'))
                        <h1 class="curentStage__sucessMessage">Заявка успешно добавлена!</h1>
                    @endif
                </div>

                <h1 class="curentStageItems__title">Участники:</h1>
                @foreach ($requests as $key=>$request)
                    <div class="curentStageItems__requests">

                        <h1 class="curentStageItems__name">{{ $key+1 }}. {{ $request -> student -> student_name }} {{ $request -> student -> student_surname }}</h1>
                        <h1 class="curentStageItems__group">Группа: {{ $request -> student -> group -> group_name }}</h1>
                        <h1 class="curentStageItems__result">{{ $request -> result -> result_name }}</h1>
                        
                        <div class="curentStageItems__btns">
                            <a href="{{ route('stageRequests.edit', [
                                'id' => $event -> id, 
                                'id_nomination' => $nomination -> id, 
                                'id_stage' => $stage -> id,
                                'id_request' => $request -> id ]) }}" 
                                class="curentStageItems__link">Редактировать</a>
                            
                            @if ($request -> id_user == auth()->user()->id)
                                <form action="{{ route('stageRequests.destroy', [
                                    'id' => $event -> id, 
                                    'id_nomination' => $nomination -> id, 
                                    'id_stage' => $stage -> id,
                                    'id_request' => $request -> id ])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="curentStageItems__dellink"
                                    onclick="return confirm('Вы точно хотите удалить эту заявку?')">Удалить</button>
                                </form>
                            @endif
                            
                        </div>
                    </div>
                @endforeach
            </div>

            @auth
            <div class="addRequest">
                <h1 class="addRequest__title">Отметить участие</h1>
                <form action="{{ route('stageRequests.store' , [
                    'id' => $event -> id, 
                    'id_nomination' => $nomination -> id, 
                    'id_stage' => $stage -> id ]) }}" 
                    class="addRequest__form" 
                    method="post">
                    @csrf
                
                    <div class="addRequest__group">
                        <select name="id_student" id="" class="addRequest__select">
                            <option value="">Выберите студента</option>
                            @foreach ($students as $student)                                    
                                <option value="{{ $student -> id }}" class="addRequest__option">{{ $student -> student_name }} {{ $student -> student_surname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="addRequest__group">
                        <select name="id_result" id="" class="addRequest__select">
                            <option value="">Выберите результат</option>
                            @foreach ($results as $result)                                    
                                <option value="{{ $result -> id }}" class="addRequest__option">{{ $result -> result_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="addRequest__submit">Добавить</button>
                </form>
            </div>
            @endauth
            
            @if(count($requests) !== 0)
                <div class="curentStage">
                    <div class="curentStage__info">
                        <div class="curentStage__group">
                            <h1 class="curentStage__title">Стадия: {{ $stage -> event_stage_name }}</h1>
                            <h1 class="curentStage__title">В номинации: {{ $nomination -> nomination_name }}</h1>    
                        </div>
                        <button class="curentStage__downloadBtn">Экспортировать в excel документ</button>
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
                                <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> user -> comission -> comission_name }}</td>
                                <td class="curentStage__td">{{ $request -> student-> group -> department -> department_name }}</td>
                                <td class="curentStage__td">{{ $request -> student-> group -> specialization -> specialization_name }}</td>
                                <td class="curentStage__td">{{ $request -> student-> group -> group_name }}</td>
                                <td class="curentStage__td">{{ $request -> student -> student_name }} {{ $request -> student -> student_surname }}</td>
                                <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> level -> event_level_name }}</td>
                                <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> type -> event_type_name }}</td>
                                <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> event_name }}</td>
                                <td class="curentStage__td">{{ $request -> stage -> nomination -> nomination_name }}</td>
                                <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> place_of_realization }}</td>
                                <td class="curentStage__td">{{ $request -> date_of_addition }}</td>
                                <td class="curentStage__td">{{ $request -> result -> result_name }}</td>
                                <td class="curentStage__td">{{ $request -> stage -> nomination -> event -> user -> name }} {{ $request -> stage -> nomination -> event -> user -> surname }} {{ $request -> stage -> nomination -> event -> user -> lastname }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
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
