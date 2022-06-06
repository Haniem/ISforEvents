@extends('layouts.app')

@section('title', 'Подтверждение заявки')

@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            
            <div class="editRequestStatus">

                <div class="editRequestStatus__info">
                    
                    <h1 class="editRequestStatus__title"><a href="{{ route('event_detail',  $request -> stage -> nomination -> event -> id) }}">{{ $request -> stage -> nomination -> event -> event_name }}</a> Мероприятие:</h1>
                    <p class="editItemForm__text">Номинация: <a href="{{ route('event_nomination',  ['id' =>$request -> stage -> nomination -> event -> id, 'id_nomination' => $request -> stage -> nomination -> event -> id])}}">{{ $request -> stage -> nomination -> nomination_name }}</a></p>
                    <p class="editItemForm__text">Этап: {{ $request -> stage -> event_stage_name }}</p>
                    <p class="editItemForm__text">Ответственный преподаватель: {{ $request -> stage -> nomination -> event -> user -> name }} {{ $request -> stage -> nomination -> event -> user -> surname }} {{ $request -> stage -> nomination -> event -> user -> lastname }}</p>
                    <p class="editItemForm__text">Участник: {{ $request -> student -> student_name }} {{ $request -> student -> student_surname }}</p>
                    <p class="editItemForm__text">Результат: {{ $request -> result -> result_name }}</p>
                    <p class="editItemForm__text">Статус заявки: {{ $request -> status -> request_status_name }}</p>
                </div>

            </div>
            
            <div class="editRequestStatus__btns">

                <form action="{{ route('requests.update', $request -> id)}}" method="post">
                    @csrf
                    @method('put')

                    <input type="text" name="id_request_status" value="2" hidden>

                    <button 
                    type="submit" 
                    class="editRequestStatus__accept"
                    onclick="return confirm('Подтвердить заявку?')">Подтвердить</button>
                </form>
    
                <form action="{{ route('requests.update', $request -> id)}}" method="post">
                    @csrf
                    @method('delete')

                    <input type="text" name="id_request_status" value="3" hidden>

                    <button 
                    type="submit" 
                    class="editRequestStatus__decline"
                    onclick="return confirm('Отменить заявку?')">Отменить</button>
                </form>

            </div>
            
            
            
            {{-- <form class="editItemForm" action="{{ route('students.update', $student->id) }}" method="POST">
                @method("PUT")
                @csrf

                <div class="editItemForm__item">
                    <label for="student_name" class="editItemForm__label">Имя</label>
                    <input 
                    name="student_name" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $student -> 	student_name }}">
                </div>

                <div class="editItemForm__item">
                    <label for="group_name" class="editItemForm__label">Группа</label>
                    <select name="group_name" id="" class="editItemForm__input">
                        @foreach ($groups as $key=>$group)

                            @if ($student -> group_name == $group -> group_name)
                                <option value="{{ $group -> group_name }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $group -> group_name }}</option>
                            @else 
                                <option value="{{ $group -> group_name }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $group -> group_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                

                <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>

                

                <a href="{{ route('students.index')}}" class="goBackLink">Назад</a></div>


            </form> --}}
        </div>
    </div>

@endsection 
