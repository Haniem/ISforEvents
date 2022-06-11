@extends('layouts.app')

@section('title', 'Редактирование информации об отделении')

@section('content')
    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <div class="editItemForm">
                <h1 class="editItemForm__title">Редактирование информации об отделении</h1>

                <form class="editItemForm" action="{{ route('departments.update', $department->id) }}" method="POST">
                    @method("PUT")
                    @csrf

                    <div class="editItemForm__item">
                        <label for="student_name" class="editItemForm__label">Имя</label>
                        <input 
                        name="department_name" 
                        type="text" 
                        class="editItemForm__input" 
                        value="{{ $department -> 	department_name }}">
                    </div>

                    <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>

                    <a href="{{ route('departments.index')}}" class="goBackLink">Назад</a></div>
                </form>
            </div>
        </div>
    </div>
@endsection 
