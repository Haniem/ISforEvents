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



                        <div class="adminList__item">

                            @dump($request -> student -> student_name)
                            @dump($request -> student -> student_surname)
                            @dump($request -> student -> student_lastname)
                            @dump($request -> student -> group_name)
                            @dump($request -> student -> department)
                            @dump($request -> stage -> event_stage_name)
                            @dump($request -> event)
                            {{-- <h2 class="adminList__title">{{ $key+1 }}. {{ $request -> id }} {{ $request -> student }}</h3> --}}
                            <div class="adminList__group">
                                <a href="{{ route('requests.edit', $request -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('requests.destroy', $request -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить этого студента?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
