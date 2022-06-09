@extends('layouts.app')

@section('title', 'Редактирование информации о студенте')

@section('content')

    <div class="admin">
        <div class="container">
            @include('admin.partials.header')
            <div class="main">
                
                <h1 class="editItemForm__title">Редактирование информации о студенте</h1>

                <form class="editItemForm" action="{{ route('students.update', $student->id) }}" method="POST">
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
                        <label for="student_surname" class="editItemForm__label">Фамилия</label>
                        <input 
                        name="student_surname" 
                        type="text" 
                        class="editItemForm__input" 
                        value="{{ $student -> student_surname }}">
                    </div>

                    <div class="editItemForm__item">
                        <label for="student_lastname" class="editItemForm__label">Отчество</label>
                        <input 
                        name="student_lastname" 
                        type="text" 
                        class="editItemForm__input" 
                        value="{{ $student ->  student_lastname}}">
                    </div>

                    <div class="editItemForm__item">
                        <label for="course" class="editItemForm__label">Курс</label>
                        <input 
                        name="course" 
                        type="text" 
                        class="editItemForm__input" 
                        value="{{ $student ->  course}}">
                    </div>

                    <div class="editItemForm__item">
                        <label for="id_group" class="editItemForm__label">Группа</label>
                        <select name="id_group" id="" class="editItemForm__input">
                            @foreach ($groups as $key=>$group)
                                @if ($student -> group_name == $group -> group_name)
                                    <option value="{{ $group -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $group -> group_name }}</option>
                                @else 
                                    <option value="{{ $group -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $group -> group_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <a class="editItemForm__link" href="{{ route('groups.create') }}">Создать группу</a>
                    </div>

                    

                    <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>


                    <a href="{{ route('students.index')}}" class="goBackLink">Назад</a></div>


                </form>
            </div>
        </div>
    </div>
@endsection 
