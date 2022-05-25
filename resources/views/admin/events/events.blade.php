@extends('layouts.app')

@section('title', 'Список мероприятий')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="adminList">
                <h1 class="adminList__title">Список мероприятий:</h1>
                
                <div class="adminList__list">
                    @foreach ($events as $event)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $event -> event_name }}</h3>
                                <a href="{{ route('events.show', ['event' => $event -> id])}}" class="adminList__detailLink">Редактировать</a></div>
                        
                    @endforeach
                </div>
                {{ $events->links() }}

            </div>
        </div>
    </div>

    
    
@endsection
