@extends('layouts.app')

@section('title', 'Список студентов')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="adminList">
                <h1 class="adminList__title">Список студентов:</h1>

                <a href="{{ route('students.create') }}" class="adminList__detailLink">Добавить</a>
                
                <div class="adminList__list">
                    @foreach ($students as $key=>$student)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $key+1 }}. {{ $student -> student_name }} {{ $student -> student_name }}</h3>
                                <h2 class="adminList__title">{{ $student -> group_name }}</h3>
                            <div class="adminList__group">
                                <a href="{{ route('students.edit', $student -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('students.destroy', $student -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить этого студента?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
