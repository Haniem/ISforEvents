@extends('layouts.app')

@section('title', 'Список мероприятий')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="adminList">
                <h1 class="adminList__title">Список мероприятий:</h1>

                <a href="{{ route('events.create') }}" class="adminList__detailLink">Добавить</a>
                
                <div class="adminList__list">
                    @foreach ($events as $event)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $event -> event_name }}</h3>
                            <div class="adminList__group">
                                <a href="{{ route('events.edit', $event -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('events.destroy', $event -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Are you sure you want to delete?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
                {{ $events->links() }}

            </div>
        </div>
    </div>

    
    
@endsection
