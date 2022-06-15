@extends('layouts.app')

@section('title', 'Список мероприятий')

@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            
            <div class="adminHome">

                <h1 class="adminHome__title">Разделы административного портала</h1>

                <div class="adminHome__group">

                    <a class="adminHome__link" href="{{ route('events.index') }}">1. Мероприятия</a>
                    <a class="adminHome__link" href="{{ route('students.index') }}">2. Студенты</a>
                    <a class="adminHome__link" href="{{ route('groups.index') }}">3. Группы</a>
                    <a class="adminHome__link" href="{{ route('departments.index') }}">4. Отделения</a>
                    <a class="adminHome__link" href="{{ route('specializations.index') }}">5. Специальности</a>
                    <a class="adminHome__link" href="{{ route('users.index') }}">6. Пользователи</a>
                    <a class="adminHome__link" href="{{ route('adminUsers.index') }}">7. Администраторы</a>

                </div>

            </div>

        </div>
    </div>
@endsection
