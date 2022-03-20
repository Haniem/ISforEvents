@extends('layouts.app')

@section('title', "Мероприятие")

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="event_types">
            @foreach ($event_types as $event_type )
                <a class="event_types__link" href="{{ route('show_event_with_type', $event_type -> id) }}">{{ $event_type -> event_type_name }}</a>
            @endforeach
        </div>

        
        
    </div>
    
@endsection
