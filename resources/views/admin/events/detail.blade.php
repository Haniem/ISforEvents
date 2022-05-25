@extends('layouts.app')

@section('title', 'Редактирование мероприятия')


@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="eventDetail">
            @include('admin.partials.eventInfo', $event)

            <a href="{{ route('events.edit', $event->id) }}" class="linkToEdit">Редактировать</a>
            <a href="{{ route('events.edit', $event->id) }}" class="linkToDelete">Удалить</a>
        </div>

        

        {{-- <form class="editItemForm" action="" method="POST">

            <div class="editItemForm__item">
                <label for="" class="editItemForm__label"></label>
                <input type="text" class="editItemForm__input">
            </div>

        </form> --}}

    </div>

@endsection