@extends('layouts.welcome')
@section('header')
    Уроки
@endsection
@section('content')
    <div class="row">
        <div class="mx-auto p-5 size-32" style="width: 60%">
            <div class="card bg-">
                <div class="card-body">
                    <div>
                        <h2 class="text-white text-xxl text-center"><b>{{$lesson->name}}</b></h2>
                        <p class="text-white text-lg"><b>Курс: </b> {{$lesson->course->name}} </p>
                        <p class="text-white text-lg"><b>Дата создания: </b> {{$lesson->created_at}} </p>
                        <p class="text-white text-lg"><b>Дата изменения: </b> {{$lesson->updated_at}}</p>
                        @can('view_admin', auth()->user())
                            <p class="text-white text-xl text-center"><a
                                    class="btn btn-block btn-warning btn-lg text-white w-75"
                                    href="{{route('Lesson.edit', $lesson->id)}}">Обновить</a></p>
                            <p class="text-white text-xl">
                            <form action="{{route('Lesson.destroy', $lesson->id)}}" method="post"
                                  class="text-center mt-2">
                                @csrf
                                @method('delete')
                                <input class="btn btn-block btn-danger btn-lg w-75" type="submit" value="Удалить">
                            </form>
                            </p>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
