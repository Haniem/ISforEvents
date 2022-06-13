@extends('layouts.app')


@section('title', 'Авторизация')

@section('content')

    <div class="container">
        <div class="auth">

            <div class="auth__leftSide">
                <img src="{{ asset('public/images/MGTU_logo.png') }}" alt="Логотип МГТУ" class="auth__logo">
            </div>
            
            <div class="auth__rightSide">

                <h1 class="auth__title">Войти в аккаунт</h1>

                @error('loginError')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

                <form action="{{ route('login_process') }}" method="post" class="auth__form">
                    @csrf

                    

                    <div class="auth__form-item">
                        <input type="text" class="auth__form-input" name="username" placeholder="Логин">
                    </div>

                    <div class="auth__form-item">
                        <input type="password" class="auth__form-input" name="password" placeholder="Пароль">
                    </div>

                    <button type="submit" class="auth__form-submit">Войти</button>

                    <div class="auth__form-item">
                        <a href="{{ route('home') }}" class="auth__homeBtn">На главную</a>
                    </div>
                    
                    <div class="auth__form-item">
                        <p class="auth__regBtn-text">У вас еще нет аккаунта? <a href="{{ route('register') }}" class="auth__regBtn">Зарегистрироваться</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection 