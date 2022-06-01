@extends('layouts.app')

@section('title', 'Редактирование администратора')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">

            @dump($errors->all())
            
            <h1 class="editItemForm__title">Редактирование данных администратора</h1>

            <form class="editItemForm" action="{{ route('adminUsers.update', $adminUser->id) }}" method="POST">
                @method("PUT")
                @csrf

                <div class="editItemForm__item">
                    <label for="username " class="editItemForm__label">Логин</label>
                    <input 
                    name="username" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $adminUser ->  username }}">
                </div>

                <div class="editItemForm__item">
                    <label for="email " class="editItemForm__label">Почта</label>
                    <input 
                    name="email" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $adminUser ->  email }}">
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

                

                <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>


                <a href="{{ route('adminUsers.index')}}" class="goBackLink">Назад</a></div>


            </form>
        </div>
    </div>

@endsection