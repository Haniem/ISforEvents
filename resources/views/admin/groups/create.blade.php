@extends('layouts.app')

@section('title', 'Добавить группу')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1 class="addItem__title">Добавить группу</h1>

            <form action="{{ route('groups.store') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="group_name" class="addItemForm__label">Название</label>
                    <input type="text" name="group_name" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="id_department" id="" required>
                        <option class="addItemForm__option" value="">Наименование отделения</option>
                        @foreach ($departments as $department)
                            <option class="addItemForm__option" value="{{ $department -> id }}">{{ $department -> department_name }}</option>
                        @endforeach
                    </select>
                    <a  class="editItemForm__link" href="{{ route('departments.create') }}">Добавить отделение</a>
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="id_specialization" id="" required>
                        <option class="addItemForm__option" value="">Наименование специальности</option>
                        @foreach ($specializations as $specialization)
                            <option class="addItemForm__option" value="{{ $specialization -> id }}">{{ $specialization -> specialization_name }}</option>
                        @endforeach
                    </select>
                    <a  class="editItemForm__link" href="{{ route('specializations.create') }}">Добавить специальность</a>
                </div>

                
                <button type="submit" class="addItem__form-submit">Добавить</button>
            </form>

        </div>
    </div>

@endsection