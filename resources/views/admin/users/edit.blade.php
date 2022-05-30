@extends('layouts.app')

@section('title', 'Редактирование группы')

@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">

            <h1 class="editItemForm__title">Редактирование мероприятия</h1>

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
                    <label for="" class="editItemForm__label">Тип мероприятия</label>
                    <select name="department" id="" class="editItemForm__input">
                        @foreach ($departments as $key=>$department)
                            @if ($group -> department == $department -> department_name)
                                <option value="{{ $department -> department_name }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $department -> department_name }}</option>
                            @else 
                            <option value="{{ $department -> department_name }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $department -> department_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                

                <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>


                <a href="{{ route('groups.index')}}" class="goBackLink">Назад</a></div>


            </form>
        </div>
    </div>

@endsection
