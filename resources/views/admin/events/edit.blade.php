@extends('layouts.app')

@section('title', 'Редактирование мероприятия')


@section('content')

    <div class="admin">
        @include('admin.partials.header')
        <div class="main">
            @include('admin.partials.eventInfo', $event)

            <form class="editItemForm" action="{{ route('events.update', $event->id) }}">
                @method('PUT')
                @csrf

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label"></label>
                    <input 
                    name="event_name" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event -> event_name }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label"></label>
                    <input 
                    name="event_discrtiption" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event -> event_discrtiption }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label"></label>
                    <input 
                    name="event_format" 
                    type="text" 
                    class="editItemForm__input" 
                    value="{{ $event ->  event_format}}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label"></label>
                    <input 
                    name="begin_date" 
                    type="date" 
                    class="editItemForm__input" 
                    value="{{ $event ->  begin_date}}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label"></label>
                    <input name="end_date" type="date" class="editItemForm__input" value="{{ $event ->  end_date}}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label"></label>
                    <input name="event_requirements" type="text" class="editItemForm__input" value="{{ $event -> event_requirements }}">
                </div>

                <div class="editItemForm__item">
                    <label for="" class="editItemForm__label"></label>
                    <input name="event_link" type="text" class="editItemForm__input" value="{{ $event -> event_link }}">
                </div>

                <button class="etidItemForm__submit linkToEdit" type="submit">Редактировать</button>


                <a href="{{ route('events.show', ['event' => $event -> id])}}" class="goBackLink">Назад</a></div>


            </form>
        </div>
    </div>

@endsection