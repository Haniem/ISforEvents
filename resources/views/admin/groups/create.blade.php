@extends('layouts.app')

@section('title', 'Добавить группу')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1>Добавить группу</h1>

            <form action="{{ route('groups.store') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="group_name" class="addItemForm__label">Название</label>
                    <input type="text" name="group_name" class="addItemForm__input">
                </div>

                <div class="addItemForm__group">
                    <select class="addItemForm__input" name="department" id="" required>
                        <option class="addItemForm__option" value="">Наименование отделения</option>
                        @foreach ($departments as $department)
                            <option class="addItemForm__option" value="{{ $department -> department_name }}">{{ $department -> department_name }}</option>
                        @endforeach
                    </select>
                </div>

                
                <button type="submit" class="addEvent__form-submit">Добавить</button>
            </form>

        </div>
    </div>

@endsection