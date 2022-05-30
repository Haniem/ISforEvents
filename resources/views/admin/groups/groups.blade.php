@extends('layouts.app')

@section('title', 'Список групп')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="adminList">
                <h1 class="adminList__title">Список групп:</h1>

                <a href="{{ route('groups.create') }}" class="adminList__detailLink">Добавить</a>
                
                <div class="adminList__list">
                    @foreach ($groups as $key=>$group)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $group -> group_name }}</h3>
                            <div class="adminList__group">
                                <a href="{{ route('groups.edit', $group -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('groups.destroy', $group -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить эту группу?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
