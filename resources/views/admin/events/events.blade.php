@extends('layouts.app')

@section('title', 'Список мероприятий')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="events">
                <h1 class="events__title">Список мероприятий:</h1>
                
                <div class="eventList">
                    @foreach ($events as $event)

                        <div class="eventList__item">
                            <h2 class="eventList__title">{{ $event -> event_name }}</h3>
                            <a href="{{ route('event_detail', ['id' => $event -> id])}}" class="eventList__detailLink">Подробнее</a></div>
                        
                    @endforeach
                </div>
                {{ $events->links() }}

            </div>
        </div>
    </div>

    
    
@endsection