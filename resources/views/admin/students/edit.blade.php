@extends('layouts.app')

@section('title', '{{ $student -> student_name }} {{ $student -> student_surname }}')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="events">
                <h1 class="events__title">Список студентов:</h1>
                
                <div class="eventList">

                    
                </div>

            </div>
        </div>
    </div>

    
    
@endsection
