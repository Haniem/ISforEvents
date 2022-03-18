@extends('layouts.app')

@section('title', 'Списки')

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="list">

            <h1 class="title">Отделения</h1>

            @auth('web')
                <h1 class="list__title">Добавить отделение:</h1>

                <form action="{{ route('addDepartment') }}" class="addForm" method="POST">

                    @csrf

                    <div class="addForm_group">
                        <label for="department_name" class="addForm_group-label"></label>
                        <input name="department_name" type="text" class="addForm_input">
                    </div>

                    <button type="submit">Добавить</button>

                </form>
            @endauth

            

            <h1 class="list__title">Список отделений:</h1>

            <div class="list__items">

                @auth('web')

                    @foreach ($departments as $department)
                            
                    <form class="list__group" action="{{ route('deleteDepartment') }}" method="POST">
                        @method('DELETE')
                        @csrf

                        <input type="text" hidden name="id" value="{{ $department -> id }}">

                        <p class="list__group-title">{{ $department -> department_name }}</p>

                        <button type="submit">Удалить</button>

                    </form>

                    @endforeach

                @endauth

                @guest

                    @foreach ($departments as $department)
                        
                    <div class="list__group">

                        <p class="list__group-title">{{ $department -> department_name }}</p>

                    </div>

                    @endforeach

                @endguest

                

            </div>

        </div>
        
    </div>
    
@endsection
