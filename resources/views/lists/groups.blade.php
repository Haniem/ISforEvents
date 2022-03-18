@extends('layouts.app')

@section('title', 'Списки')

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="list">

            <h1 class="title">Группы</h1>

            @auth('web')
                <h1 class="list__title">Добавить группу:</h1>

                <form action="{{ route('addGroup') }}" class="addForm" method="POST">

                    @csrf

                    <div class="addForm_group">
                        <label for="name" class="addForm_group-label">Название:</label>
                        <input name="name" type="text" class="addForm_input">
                    </div>

                    <div class="addForm_group">
                        <label for="name" class="addForm_group-label">Отделение:</label>
                        <select name="department" id="" class="addForm_input">
                            @foreach ($departments as $department)
                                
                                <option value="{{ $department -> department_name }}">{{ $department -> department_name }}</option>

                            @endforeach
                        </select>
                    </div>

                    <button type="submit">Добавить</button>

                </form>
            @endauth

            

            <h1 class="list__title">Список групп:</h1>

            <div class="list__items">

                @auth('web')

                    @foreach ($groups as $group)
                            
                    <form class="list__group" action="{{ route('deleteGroup') }}" method="POST">
                        @method('delete')
                        @csrf

                        <input type="text" hidden name="id" value="{{ $group -> id }}">

                        <p class="list__group-title">{{ $group -> group_name }}</p>

                        <p class="list__group-title">Отделение: {{ $group -> department }}</p>

                        <button type="submit">Удалить</button>

                    </form>

                    @endforeach

                @endauth

                @guest

                    @foreach ($groups as $group)
                        
                    <div class="list__group">

                        <p class="list__group-title">{{ $group -> group_name }}</p>

                        <p class="list__group-title">Отделение: {{ $group -> department }}</p>

                    </div>

                    @endforeach

                @endguest

                

            </div>

        </div>
        
    </div>
    
@endsection
