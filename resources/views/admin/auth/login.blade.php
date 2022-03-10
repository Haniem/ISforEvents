@extends('layouts.app')


@section('title', 'Авторизация админа')

@section('content')
    <div class="auth">

        <h1 class="auth__title">Войти в аккаунт</h1>

        <form action="{{ route('admin.login_process') }}" method="post" class="auth__form">
            @csrf

            @error('username')
                <p class="text-danger">{{ $message }}</p>
            @enderror

            <label class="auth__form-label" for="username">Имя пользователя</label>
            <input type="text" class="auth__form-input" name="username">

        
            <label class="auth__form-label" for="password">Пароль</label>
            <input type="password" class="auth__form-input" name="password">


            <button type="submit" class="auth__form-submit">Войти</button>

        </form>

        <a href="{{ route('home') }}" class="auth__homeBtn">На главную</a>
    </div>
@endsection 