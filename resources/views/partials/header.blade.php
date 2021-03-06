<div class="header">
    <div class="header__container">

        
        <div class="header__logo">
            <a  href="{{ route('home') }}"><img class="logo__img" src="{{ asset("public/images/logo.png") }}" alt=""></a>
        </div>
    
        <div class="header__nav">
            <ul class="nav__btns">
                <li class="nav__btn"> <a href="{{ route('events') }}">Главная</a> </li>
                <li class="nav__btn"> <a href="{{ route('event_types') }}">Категории</a> </li>
                @auth('web')
                    <li class="nav__btn"> 
                        <a href="
                        @if(auth('admin')->check())
                            {{ route('admin.home') }}
                        @else 
                            {{ route('admin.login') }}
                        @endif
                        ">Административная панель</a> 
                    </li>
                @endauth
                
            </ul>
        </div>
    
        <div class="header__auth">

            @auth("web")                
                <a href="{{ route('profile.index',  auth()->user()->id ) }}" class="auth__btn username">{{ auth("web")->user()->name }} {{ auth("web")->user()->surname }}</a>
                <a href="{{ route('logout') }}" class="auth__btn">Выход</a> 
            @endauth
    
            @guest("web")
                <a href="{{ route('login') }}" class="auth__btn">Вход</a>
                <a href="{{ route('register') }}" class="auth__btn">Регистрация</a>
            @endguest
        </div>

        <button class="header__menuBtn">Меню</button>
    </div>
    
    <script src="{{ asset('public/js/app.js') }}"></script>
</div>