@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">
        <div class="event_types">
            @foreach ($event_types as $event_type )
                <a class="event_types__link" href="{{ route('show_event_with_type', $event_type -> id) }}">
                    <div class="event_types__group">
                        <img src="/public/images/{{ $event_type -> event_type_logo_name }}" alt="" class="event_types-logo">
                        <p class="event_types__text">{{ $event_type -> event_type_name }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    
@endsection
