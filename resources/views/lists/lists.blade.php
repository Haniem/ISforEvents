@extends('layouts.app')

@section('title', 'Списки')

@section('content')

    @include('partials.header')

    <div class="container">

        <div class="listsLinks">

            <a href="{{ route('showDeaprtments') }}" class="link">Список отделений</a>
            <a href="{{ route('showGroups') }}" class="link">Список групп</a>
            <a href="{{ route('showStudents') }}" class="link">Список студентов</a>

        </div>
        
    </div>
    
@endsection
