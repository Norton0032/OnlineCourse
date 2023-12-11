@extends('layouts.welcome')
@section('header')
    Пользователи
@endsection
@section('content')
    <div class="row">
        <div class="mx-auto p-5 size-32" style="width: 60%">
            <div class="card bg-">
                <div class="card-body">
                    <div>
                        <h2 class="text-white text-xxl text-center"><b>{{$user->name}}</b></h2>
                        <p class="text-white text-lg"><b>Почта: </b> {{$user->email}} </p>
                        <p class="text-white text-lg"><b>Номера групп: </b>
                            @foreach($user->groups as $group)
                                <a href="{{route('Group.show', $group->id)}}"
                                   style="text-decoration: none">{{$group->id}}</a>
                            @endforeach
                        </p>
                        <p class="text-white text-lg"><b>Роль: </b> {{$user->role}} </p>
                        <p class="text-white text-lg"><b>Дата создания: </b> {{$user->created_at}} </p>
                        <p class="text-white text-lg"><b>Дата изменения: </b> {{$user->updated_at}}</p>
                        @can('view_admin', auth()->user())
                            <p class="text-white text-xl text-center"><a
                                    class="btn btn-block btn-warning btn-lg text-white w-75"
                                    href="{{route('User.edit', $user->id)}}">Обновить</a></p>
                            <p class="text-white text-xl">
                            <form action="{{route('User.destroy', $user->id)}}" method="post" class="text-center mt-2">
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
