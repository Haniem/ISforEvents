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
                <a href="{{ route('home') }}" class="nav__btn"> На главную   </a>
                <a href="{{ route('events.index') }}" class="nav__btn"> Мероприятия   </a>
                <a href="{{ route('requests.index') }}" class="nav__btn"> Заявки  </a>
                <a href="{{ route('students.index') }}" class="nav__btn"> Студенты </a>
                <a href="{{ route('groups.index') }}" class="nav__btn"> Группы </a>
                <a href="{{ route('departments.index') }}" class="nav__btn"> Отделения </a>
                <a href="{{ route('specializations.index') }}" class="nav__btn"> Специальности </a>
                <a href="{{ route('users.index') }}" class="nav__btn"> Пользователи </a>
                <a href="{{ route('adminUsers.index') }}" class="nav__btn"> Администраторы </a>
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