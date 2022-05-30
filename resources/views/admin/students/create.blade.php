@extends('layouts.app')

@section('title', 'Добавить студента')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1>Добавить студента</h1>

            <form action="{{ route('students.store') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="student_name" class="addItemForm__label">Имя</label>
                    <input type="text" name="student_name" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <label for="student_surname" class="addItemForm__label">Фамилия</label>
                    <input type="text" name="student_surname" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <label for="student_lastname" class="addItemForm__label">Отчество</label>
                    <input type="text" name="student_lastname" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <label for="course" class="addItemForm__label">Курс(От 1 до 5)</label>
                    <input type="text" name="course" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="group_name" id="" required>
                        <option class="addItemForm__option" value="">Наименование группы</option>
                        @foreach ($groups as $group)
                            <option class="addItemForm__option" value="{{ $group -> group_name }}">{{ $group -> group_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="addEvent__form-submit">Добавить</button>
            </form>

        </div>
    </div>

@endsection