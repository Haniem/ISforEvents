@extends('layouts.app')

@section('title', 'Добавить отделение')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1 class="addItem__title">Добавить отделение</h1>

            <form action="{{ route('departments.store') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="department_name" class="addItemForm__label">Имя</label>
                    <input type="text" name="department_name" class="addItemForm__input">
                </div>
                
                <button type="submit" class="addItem__form-submit">Добавить</button>
            </form>

        </div>
    </div>

@endsection