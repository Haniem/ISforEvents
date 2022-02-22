<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- стили --}}
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    {{-- шрифты --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">

    <title>НИРС</title>
</head>
<body>
    <div class="header">
        <div class="header__logo">
            
            <a  href="{{ route('home') }}"><img class="logo__img" src="{{ asset("images/logo.png") }}" alt=""></a>
        </div>

        <div class="header__nav">
            <ul class="nav__btns">
                <li class="nav__btn"> <a href="{{ route('home') }}">Главная</a> </li>
                <li class="nav__btn"> <a href="{{ route('home') }}">Категории</a> </li>
                <li class="nav__btn"> <a href="{{ route('home') }}">Админка</a> </li>
                <li class="nav__btn"> <a href="{{ route('home') }}">Личный кабинет</a> </li>
            </ul>
        </div>

        <div class="header__auth">
            <a href="#" class="auth__btn">Вход</a>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>