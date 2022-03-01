@extends('layouts.app')


@section('title', 'Регистрация')

@section('content')
    <div class="auth">

        <h1 class="auth__title">Регистрация нового аккаунта</h1>

        <form action="{{ route('register_process') }}" method="post" class="auth__form">
            @csrf

           

            <div class="auth__form-item">
                
                <input type="text" class="auth__form-input" name="name" placeholder="Имя">

                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="auth__form-item">
                
                <input type="text" class="auth__form-input" name="surname" placeholder="Фамилия">

                @error('surname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                
            </div>
            
            <div class="auth__form-item">
                
                <input type="text" class="auth__form-input" name="lastname" placeholder="Отчество">

                @error('lastname')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                
            </div>
            
            <div class="auth__form-item">
                
                <input type="text" class="auth__form-input" name="username" placeholder="Имя пользователя">

                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                
            </div>

            <div class="auth__form-item">
                
                <input type="emai" class="auth__form-input" name="email" placeholder="Почта">

                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                
            </div>

            <div class="auth__form-item">
                
                <input type="password" class="auth__form-input" name="password" placeholder="Пароль">

                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                
            </div>

            <div class="auth__form-item">
                    
                <input type="password" class="auth__form-input" name="password_confirmation" placeholder="Подтверждение пароля">

            </div>


            <button type="submit" class="auth__form-submit">Зарегестрироваться</button>

        </form>

        <a href="{{ route('home') }}" class="auth__homeBtn">На главную</a>
    </div>
@endsection 