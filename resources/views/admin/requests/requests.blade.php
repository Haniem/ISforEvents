@extends('layouts.app')

@section('title', 'Список заявок')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="adminList">
                <h1 class="adminList__title">Список заявок:</h1>
                
                <div class="adminList__list">
                    @foreach ($requests as $key=>$request)

                        {{-- @if($request -> id_request_status == 1) --}}
                            <div class="adminList__item">

                                
                                <h2 class="adminList__title">{{ $key+1 }}. {{ $request -> stage -> nomination -> event -> event_name }} | {{ $request -> stage -> event_stage_name }} | {{ $request -> student -> student_name }} {{ $request -> student -> student_surname }} | {{ $request -> status -> request_status_name }}</h3>
                                <div class="adminList__group">
                                    <a href="{{ route('requests.edit', $request -> id)}}" class="adminList__detailLink">Редактировать</a>
                                </div>
                            </div>
                        {{-- @endif --}}

                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
