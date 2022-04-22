<div class="adminadminHeader">
    <div class="adminHeader__container">
        <div class="adminHeader__logo">
            <img class="logo__img" src="{{ asset("public/images/MGTU_Logo.png") }}" alt="">
        </div>

        {{-- <div class="adminHeader__secLogo">
            <a  href="{{ route('home') }}"><img class="logo__img" src="{{ asset("public/images/logo.png") }}" alt=""></a>
        </div> --}}
    
        <div class="adminHeader__nav">
            <ul class="nav__btns">
                <a href="{{ route('events.index') }}" class="nav__btn"> Мероприятия   </a>
                <a href="{{ route('events.index') }}" class="nav__btn"> Не подтвержденные мероприятия </a>
                <a href="" class="nav__btn"> Добавить мероприятие </a>
                <a href="" class="nav__btn"> Преподаватели </a>
                <a href="" class="nav__btn"> Студенты </a>
                <a href="" class="nav__btn"> Группы </a>
                <a href="" class="nav__btn"> Отделения </a>
            </ul>
        </div>
    
        <div class="adminHeader__auth">
            @auth("admin")
                <a href="{{ route('admin.logout') }}" class="auth__btn">Выход</a> 
            @endauth
        </div>

        {{-- <button class="adminHeader__menuBtn">Меню</button> --}}
    </div>
    
    <script src="public/js/app.js"></script>
</div>