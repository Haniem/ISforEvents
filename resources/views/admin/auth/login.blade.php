@extends('layouts.app')


@section('title', 'Авторизация')

@section('content')

    <div class="container">
        <div class="auth">

            <div class="auth__leftSide">
                <img src="{{ asset('public/images/MGTU_logo.png') }}" alt="Логотип МГТУ" class="auth__logo">
            </div>
            
            <div class="auth__rightSide">

                <h1 class="auth__title">Вход в панель администратора</h1>

                <form action="{{ route('admin.login_process') }}" method="post" class="auth__form">
                    @csrf

                    

                    <div class="auth__form-item">
                        <input type="text" class="auth__form-input" name="username" placeholder="Логин">
                        @error('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="auth__form-item">
                        <input type="password" class="auth__form-input" name="password" placeholder="Пароль">
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="auth__form-submit">Войти</button>

                    <div class="auth__form-item">
                        <a href="{{ route('home') }}" class="auth__homeBtn">На главную</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
@endsection 