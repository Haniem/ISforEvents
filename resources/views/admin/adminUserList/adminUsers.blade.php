@extends('layouts.app')

@section('title', 'Список администраторов')

@section('content')
    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <div class="adminList">
                <div class="adminList__prev">
                    <h1 class="adminList__title">Список администраторов:</h1>
                    <a href="{{ route('adminUsers.create') }}" class="adminList__addItemLink">Добавить</a>
                </div>
                <div class="adminList__list">
                    @foreach ($adminUsers as $key=>$adminUser)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $key+1 }}. {{ $adminUser -> username }}</h3>
                            <div class="adminList__group">
                                <a href="{{ route('adminUsers.edit', $adminUser -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('adminUsers.destroy', $adminUser -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить этого администратора?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
