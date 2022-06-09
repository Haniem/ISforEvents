@extends('layouts.app')

@section('title', 'Список пользователей')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="main">
                <h1 class="adminList__title">Список пользователей:</h1>

                <a href="{{ route('users.create') }}" class="adminList__detailLink">Добавить</a>
                
                <div class="adminList__list">
                    @foreach ($users as $key=>$user)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $key+1 }}. {{ $user -> name }} {{ $user -> surname }} {{ $user -> lastname }}</h3>
                            <div class="adminList__group">
                                <a href="{{ route('users.edit', $user -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('users.destroy', $user -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить это пользователя?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                        
                    @endforeach
                </div>

            </div>
        </div>
    </div>
@endsection
