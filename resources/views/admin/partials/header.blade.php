<div class="adminHeader">
    <div class="adminHeader__container">
        <div class="menu__icon">
            <span></span>
        </div>

        <div class="adminHeader__nav">
            <h1 class="adminHeader__navTitle">Меню</h1>
            <ul class="nav__btns">
                <a href="{{ route('home') }}" class="nav__btn"> На главную   </a>
                <a href="{{ route('events.index') }}" class="nav__btn"> Мероприятия   </a>
                <a href="{{ route('students.index') }}" class="nav__btn"> Студенты </a>
                <a href="{{ route('groups.index') }}" class="nav__btn"> Группы </a>
                <a href="{{ route('departments.index') }}" class="nav__btn"> Отделения </a>
                <a href="{{ route('specializations.index') }}" class="nav__btn"> Специальности </a>
                <a href="{{ route('users.index') }}" class="nav__btn"> Пользователи </a>
                <a href="{{ route('adminUsers.index') }}" class="nav__btn"> Администраторы </a>
                <a href="{{ route('admin.logout') }}" class="nav__btn">Выход</a> 
            </ul>
        </div>

        <div class="adminHeader__auth">
            <a href="{{ route('admin.home') }}" class="auth__btn">На главную</a>
            <a href="{{ route('admin.logout') }}" class="auth__btn">Выход</a> 
        </div>
    </div>
    <script src="{{ asset('public/js/app.js') }}"></script>
</div>