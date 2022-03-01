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
        @auth("web")
            <a href="{{ route('logout') }}" class="auth__btn">Выход</a> 
        @endauth

        @guest("web")
            <a href="{{ route('login') }}" class="auth__btn">Вход</a>
            <a href="{{ route('register') }}" class="auth__btn">Регистрация</a>
        @endguest
    </div>
</div>