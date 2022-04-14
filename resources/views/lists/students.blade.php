@extends('layouts.app')

@section('title', 'Списки')

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="list">

            @foreach ($groups as $group)

            @endforeach

            <h1 class="title">Студенты</h1>

            @auth('web')
                <h1 class="list__title">Добавить студента:</h1>

                <form action="{{ route('addStudent') }}" class="addForm" method="POST">

                    @csrf

                    <div class="addForm_group">
                        <label for="name" class="addForm_group-label">Имя:</label>
                        <input name="name" type="text" class="addForm_input">
                    </div>

                    <div class="addForm_group">
                        <label for="surname" class="addForm_group-label">Фамилия:</label>
                        <input name="surname" type="text" class="addForm_input">
                    </div>

                    <div class="addForm_group">
                        <label for="lastname" class="addForm_group-label">Отчество:</label>
                        <input name="lastname" type="text" class="addForm_input">
                    </div>

                    <div class="addForm_group">
                        <label for="course" class="addForm_group-label">Курс:</label>
                        <select name="course" id="">
                            <option value="1" class="addForm_input">1</option>
                            <option value="2" class="addForm_input">2</option>
                            <option value="3" class="addForm_input">3</option>
                            <option value="4" class="addForm_input">4</option>
                            <option value="5" class="addForm_input">5</option>
                        </select>
                    </div>

                    <div class="addForm_group">
                        <label for="group" class="addForm_group-label">Группа:</label>
                        <select name="group" id="" class="addForm_input">
                            @foreach ($groups as $group)
                                
                                <option value="{{ $group -> group_name }}" class="addForm_input">{{ $group -> group_name }}</option>

                            @endforeach
                        </select>
                    </div>

                    <button type="submit">Добавить</button>

                </form>
            @endauth

            

            <h1 class="list__title">Список студентов:</h1>

            <div class="list__items">

                @auth('web')

                    @foreach ($students as $student)
                            
                    <form class="list__group" action="{{ route('deleteStudent') }}" method="POST">
                        @method('delete')
                        @csrf

                        <input type="text" hidden name="id" value="{{ $student -> id }}">

                        <p class="list__group-title">{{ $student -> student_name }}</p>

                        <p class="list__group-title">{{ $student -> student_surname }}</p>
                        
                        <p class="list__group-title">{{ $student -> student_lastname }}</p>

                        <p class="list__group-title">{{ $student -> couse }}</p>
                        
                        <p class="list__group-title">{{ $student -> group_name }}</p>

                        <p class="list__group-title">{{ $student -> department }}</p>

                        <button type="submit">Удалить</button>

                    </form>

                    @endforeach

                @endauth

                @guest

                    @foreach ($students as $student)
                        
                    <div class="list__group">

                        <p class="list__group-title">{{ $student -> student_name }}</p>

                        <p class="list__group-title">{{ $student -> student_surname }}</p>
                        
                        <p class="list__group-title">{{ $student -> student_lastname }}</p>

                        <p class="list__group-title">{{ $student -> couse }}</p>
                        
                        <p class="list__group-title">{{ $student -> group_name }}</p>

                        <p class="list__group-title">{{ $student -> department }}</p>

                    </div>

                    @endforeach

                @endguest

                

            </div>

        </div>
        
    </div>
    
@endsection
