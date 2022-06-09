@extends('layouts.app')

@section('title', "Редактирование профиля")

@section('content')

    @include('partials.header')

    <div class="container">
        <div class="profile">

            <div class="profileBio">

                <h1 class="profileBio__title">Редактирование профиля</h1>

                <form action="{{ route('profile.update', ['id_user' => $user -> id]) }}" class="profileBio__form" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="profileBio__group">
                        <label for="name" class="profileBio__label">Имя:</label>
                        <input name="name" type="text" class="profileBio__input" value="{{ $user -> name }}">
                    </div>
                    
                    <div class="profileBio__group">
                        <label for="surname" class="profileBio__label">Фамилия:</label>
                        <input name="surname" type="text" class="profileBio__input" value="{{ $user -> surname }}">
                    </div>
                    
                    <div class="profileBio__group">
                        <label for="lastname" class="profileBio__label">Отчество:</label>
                        <input name="lastname" type="text" class="profileBio__input" value="{{ $user -> lastname }}">
                    </div>

                    <div class="profileBio__group">
                        <label for="username" class="profileBio__label">Имя пользователя:</label>
                        <input name="username" type="text" class="profileBio__input" value="{{ $user -> username }}">
                    </div>

                    <div class="profileBio__group">
                        <label for="email" class="profileBio__label">Почта:</label>
                        <input name="email" type="text" class="profileBio__input" value="{{ $user -> email }}">
                    </div>

                    <div class="profileBio__group">
                        <label for="id_comission" class="profileBio__label">Комиссия</label>
                        <select name="id_comission" id="" class="profileBio__select">
                            @foreach ($comissions as $comission)
                                @if ($comission -> id == $user -> id_comission)   
                                    <option class="profileBio__option" value="{{ $comission -> id }}" selected>{{ $comission -> comission_name }}</option>
                                @else
                                    <option class="profileBio__option" value="{{ $comission -> id }}">{{ $comission -> comission_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <button class="profileBio__submit" type="submit">Сохранить изменения</button>

                </form>
            </div>   
        </div>
    </div>
@endsection
