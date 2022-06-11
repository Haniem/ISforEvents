@extends('layouts.app')

@section('title', 'Редактирование группы')

@section('content')
    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <div class="editItemForm">
                <h1 class="editItemForm__title">Редактирование группы</h1>

                <form class="editItemForm" action="{{ route('groups.update', $group->id) }}" method="POST">
                    @method("PUT")
                    @csrf

                    <div class="editItemForm__item">
                        <label for="" class="editItemForm__label">Название</label>
                        <input 
                        name="group_name" 
                        type="text" 
                        class="editItemForm__input" 
                        value="{{ $group -> group_name }}">
                    </div>

                    <div class="editItemForm__item">
                        <label for="id_department" class="editItemForm__label">Отделение</label>
                        <select name="id_department" id="" class="editItemForm__input">
                            @foreach ($departments as $key=>$department)
                                @if ($group -> id_department == $department -> id)
                                    <option value="{{ $department -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $department -> department_name }}</option>
                                @else 
                                <option value="{{ $department -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $department -> department_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <a  class="editItemForm__link" href="{{ route('departments.create') }}">Добавить отделение</a>
                    </div>

                    <div class="editItemForm__item">
                        <label for="id_specialization" class="editItemForm__label">Специальность</label>
                        <select name="id_specialization" id="" class="editItemForm__input">
                            @foreach ($specializations as $key=>$specialization)
                                @if ($group -> id_specialization == $specialization -> id)
                                    <option value="{{ $specialization -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $specialization -> specialization_name }}</option>
                                @else 
                                <option value="{{ $specialization -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $specialization -> specialization_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <a  class="editItemForm__link" href="{{ route('specializations.create') }}">Добавить специальность</a>
                    </div>

                    <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>

                    <a href="{{ route('groups.index')}}" class="goBackLink">Назад</a>
                </form>
            </div>
        </div>
    </div>
@endsection
