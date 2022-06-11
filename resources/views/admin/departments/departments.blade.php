@extends('layouts.app')

@section('title', 'Список отделений')

@section('content')
    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <div class="adminList">
                <div class="adminList__prev">
                    <h1 class="adminList__title">Список отделений:</h1>
                    <a href="{{ route('departments.create') }}" class="adminList__addItemLink">Добавить</a>
                </div>
                <div class="adminList__list">
                    @foreach ($departments as $key=>$department)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $key+1 }}. {{ $department -> department_name }} </h3>
                            <div class="adminList__group">
                                <a href="{{ route('departments.edit', $department -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('departments.destroy', $department -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить это отделение?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
