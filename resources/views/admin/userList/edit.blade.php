@extends('layouts.app')

@section('title', 'Редактирование мероприятия')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">

            @dump($errors->all())
            
            <h1 class="editItemForm__title">Редактирование данных пользователя</h1>

            <form class="editItemForm" action="{{ route('users.update', $user->id) }}" method="POST">
                @method("PUT")
                @csrf

                <div class="editItemForm__item">
                    <label for="name" class="editItemForm__label">Имя</label>
                    <input 
                    name="name" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $user -> name }}">
                </div>

                <div class="editItemForm__item">
                    <label for="surname" class="editItemForm__label">Фамилия</label>
                    <input 
                    name="surname" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $user -> surname }}">
                </div>

                <div class="editItemForm__item">
                    <label for="lastname" class="editItemForm__label">Отчество</label>
                    <input 
                    name="lastname" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $user ->  lastname}}">
                </div>

                <div class="editItemForm__item">
                    <label for="username " class="editItemForm__label">Логин</label>
                    <input 
                    name="username" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $user ->  username }}">
                </div>

                <div class="editItemForm__item">
                    <label for="email " class="editItemForm__label">Почта</label>
                    <input 
                    name="email" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $user ->  email }}">
                </div>

                <div class="editItemForm__item">
                    <label for="password" class="editItemForm__label">Пароль</label>
                    <input 
                    name="password" 
                    type="text" 
                    class="editItemForm__input">
                </div>

                <div class="editItemForm__item">
                    <label for="password_confirmation" class="editItemForm__label">Потверждение пароля</label>
                    <input 
                    name="password_confirmation" 
                    type="text" 
                    class="editItemForm__input">
                </div>

                <div class="editItemForm__item">
                    <label for="comission" class="editItemForm__label">Тип комиссия</label>
                    <select name="comission" id="" class="editItemForm__input">
                        @foreach ($comissions as $key=>$comission)

                            @if ($user -> id_comission == $comission -> id)
                                <option value="{{ $comission -> id }}" class="editItemForm__input-option" selected>{{ $key+1 }}. {{ $comission -> comission_name }}</option>
                            @else 
                                <option value="{{ $comission -> id }}" class="editItemForm__input-option">{{ $key+1 }}. {{ $comission -> comission_name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>

                

                <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>


                <a href="{{ route('users.index')}}" class="goBackLink">Назад</a></div>


            </form>
        </div>
    </div>

@endsection