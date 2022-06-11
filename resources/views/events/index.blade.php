@extends('layouts.app')

@section('title', 'Мероприятия')

@section('content')
    @include('partials.header')
    <div class="container">
        <div class="events">
            <h1 class="events__title">Список мероприятий:</h1>

            <div class="eventList">
                @foreach ($events as $event)
                    <div class="eventList__item">
                        <h2 class="eventList__title">{{ $event -> event_name }}</h3>

                        <div class="eventList__dates">
                            <p class="eventList__text">c {{ $event -> begin_date }} </p>
                            <p class="eventList__text"> по {{ $event -> end_date }}</p>
                        </div>

                        <a href="{{ route('event_detail', ['id' => $event -> id])}}" class="eventList__detailLink">Подробнее</a></div>
                @endforeach
            </div>
            {{ $events->links() }}
        </div>
    </div>
@endsection
