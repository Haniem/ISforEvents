@extends('layouts.app')

@section('title', 'Список специальностей')

@section('content')

    <div class="admin">
        @include('admin.partials.header')

        <div class="container">

            <div class="adminList">
                <h1 class="adminList__title">Список специальностей:</h1>

                <a href="{{ route('specializations.create') }}" class="adminList__detailLink">Добавить</a>
                
                <div class="adminList__list">
                    @foreach ($specializations as $key=>$specialization)

                        <div class="adminList__item">
                            <h2 class="adminList__title">{{ $key+1 }}. {{ $specialization -> specialization_name }} </h3>
                            <div class="adminList__group">
                                <a href="{{ route('specializations.edit', $specialization -> id)}}" class="adminList__detailLink">Редактировать</a>
                                <form action="{{ route('specializations.destroy', $specialization -> id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button 
                                    type="submit" 
                                    class="adminList__detailLink"
                                    onclick="return confirm('Вы точно хотите удалить эту специальность?')">Удалить</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
