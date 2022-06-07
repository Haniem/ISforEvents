@extends('layouts.app')

@section('title', 'Добавить специальность')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <h1>Добавить специальность</h1>

            <form action="{{ route('specializations.store') }}" method="post" class="addItemForm">
                @csrf
                
                <div class="addItemForm__group">
                    <label for="specialization_name" class="addItemForm__label">Название специальности</label>
                    <input type="text" name="specialization_name" class="addItemForm__input">
                </div>
                
                <button type="submit" class="addEvent__form-submit">Добавить</button>
            </form>

        </div>
    </div>

@endsection