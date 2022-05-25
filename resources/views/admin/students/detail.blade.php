@extends('layouts.app')

@section('title', 'Список студентов')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="events">
                <h1 class="events__title">Список студентов:</h1>
                
                <div class="eventList">

                    @dump($students )
                    
                    @foreach ($students as $key=>$student)

                        <div class="eventList__item">
                            <h3 class="eventList__title">{{ $key+1 }}. {{ $student -> student_name }} {{ $student -> student_surname }} {{ $student -> student_lastname }}</h3>
                            <h3 class="eventList__title">{{ $student -> group_name }}</h3>
                                <a href="{{ route('students.show', ['student' => $student -> id])}}" class="eventList__detailLink">Редактировать</a></div>
                        
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    
    
@endsection
