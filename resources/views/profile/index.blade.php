@extends('layouts.app')

@section('title', "Личный кабинет")

@section('content')

    @include('partials.header')

    <div class="container">
        <div class="profile">

            <div class="profileBio">

                <div class="profileBio__groupUserInfo">
                    <h1 class="profileBio__title">Личный кабинет</h1>

                    <div class="profileBio__group">
                        <p class="profileBio__field">ФИО: </p>
                        <p class="profileBio__value">{{ $user -> name }} {{ $user -> surname }} {{ $user -> lastname }}</p>
                    </div>

                    <div class="profileBio__group">
                        <p class="profileBio__field">Комиссия: </p>
                        <p class="profileBio__value">{{ $user -> comission -> comission_name }}</p>
                    </div>

                    <div class="profileBio__group">
                        <p class="profileBio__field">Почта: </p>
                        <p class="profileBio__value">{{ $user -> email }}</p>                        
                    </div>

                    <div class="profileBio__group">
                        <p class="profileBio__field">Имя пользователя: </p>
                        <p class="profileBio__value">{{ $user -> username }}</p>                        
                    </div>

                    <a class="profileBio__editLink" href="{{ route('profile.edit', $user->id) }}">Редактировать</a>
                </div>

                <div class="profileOwnEvents">
                    <h1 class="profileOwnEvents__title">Ваши мероприятия:</h1>

                    <div class="profileOwnEvents__event">
                        @foreach ($events as $event)
                            <div class="profileEvents__group">
        
                                <p class="profileOwnEvents__title ">{{ $event -> event_name }}</p>
                                    
                                <div class="profileOwnEvents__dates">
                                    <p class="profileOwnEvents__text">c {{ $event -> begin_date }} </p>
                                    <p class="profileOwnEvents__text">по {{ $event -> end_date }}</p>
                                </div>
        
                                <a class="profileOwnEvents__btn" href="{{ route('event_detail', $event -> id) }}">Подробнее</a>
                            </div>       
                        @endforeach
                    </div>
                </div>
            </div>   
        </div>
    </div>
@endsection
