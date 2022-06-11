@extends('layouts.app')

@section('title', 'Редактирование специальности')

@section('content')
    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            <div class="editItemForm">
                <h1 class="editItemForm__title">Редактирование специальности</h1>

                <form class="editItemForm" action="{{ route('specializations.update', $specialization->id) }}" method="POST">
                    @method("PUT")
                    @csrf

                    <div class="editItemForm__item">
                        <label for="specialization_name" class="editItemForm__label">Название</label>
                        <input 
                        name="specialization_name" 
                        type="text" 
                        class="editItemForm__input" 
                        value="{{ $specialization -> specialization_name }}">
                    </div>

                    <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>

                    <a href="{{ route('specializations.index')}}" class="goBackLink">Назад</a></div>
                </form>
            </div>
        </div>
    </div>

@endsection 
