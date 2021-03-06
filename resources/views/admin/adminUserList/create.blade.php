@extends('layouts.app')

@section('title', 'Добавить администратора')

@section('content')
    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <div class="addItem">
                <h1 class="addItem__title">Добавить администратора</h1>

                <form action="{{ route('adminUsers.store') }}" method="post" class="addItemForm">
                    @csrf
                    
                    <div class="addItemForm__group">
                        <label for="username " class="addItemForm__label">Логин</label>
                        <input type="text" name="username" class="addItemForm__input">
                    </div>
                    
                    <div class="addItemForm__group">
                        <label for="email" class="addItemForm__label">Почта</label>
                        <input type="text" name="email" class="addItemForm__input">
                    </div>
                    
                    <div class="addItemForm__group">
                        <label for="password" class="addItemForm__label">Пароль</label>
                        <input type="text" name="password" class="addItemForm__input">
                    </div>
                    
                    <div class="addItemForm__group">
                        <label for="password_confirmation" class="addItemForm__label">Подтверждение пароля</label>
                        <input type="text" name="password_confirmation" class="addItemForm__input">
                    </div>
                    
                    <button type="submit" class="addItem__form-submit">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection