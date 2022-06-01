@extends('layouts.app')

@section('title', 'Добавить пользователя')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1>Добавить пользователя</h1>

            @dump($errors->all())

            <form action="{{ route('users.store') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="name" class="addItemForm__label">Имя</label>
                    <input type="text" name="name" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <label for="surname" class="addItemForm__label">Фамилия</label>
                    <input type="text" name="surname" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="lastname" class="addItemForm__label">Отчество</label>
                    <input type="text" name="lastname" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="username " class="addItemForm__label">Логин</label>
                    <input type="text" name="username" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="email" class="addItemForm__label">Почта</label>
                    <input type="text" name="email" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="comission" id="" required>
                        <option class="addItemForm__option" value="">Пк/Пцк</option>
                        @foreach ($comissions as $comission)
                            <option class="addItemForm__option" value="{{ $comission -> id }}">{{ $comission -> comission_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="addItemForm__group">
                    <label for="password" class="addItemForm__label">Пароль</label>
                    <input type="text" name="password" class="addItemForm__input">
                </div>
                
                <div class="addItemForm__group">
                    <label for="password_confirmation" class="addItemForm__label">Подтверждение пароля</label>
                    <input type="text" name="password_confirmation" class="addItemForm__input">
                </div>
                
                <button type="submit" class="addEvent__form-submit">Добавить</button>
            </form>

        </div>
    </div>

@endsection