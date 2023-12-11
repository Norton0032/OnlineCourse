@extends('layouts.welcome')
@section('header')
    Группы
@endsection
@section('content')
    <div class="row">
        <div class="mx-auto p-0 size-32" style="width: 60%">
            <div class="card bg-">
                <div class="card-body">
                    <div>
                        <h2 class="text-white text-xxl text-center"><b>{{$group->name}}</b></h2>
                        <p class="text-white text-lg"><b>Курс: </b> {{$group->course->name}} </p>
                        <p class="text-white text-lg"><b>Дата создания: </b> {{$group->created_at}} </p>
                        <p class="text-white text-lg"><b>Дата изменения: </b> {{$group->updated_at}}</p>
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 20%">
                                    Имя пользователя
                                </th>
                                <th style="width: 20%">
                                    Действия
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($group->users as $user)
                                <tr>
                                    <td>
                                        <a>
                                            {{$user->name}}
                                        </a>
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-primary btn-sm" href="{{route('User.show', $user->id)}}">
                                            <i class="fas fa-folder">
                                            </i>
                                            Подробнее
                                        </a>
                                        @can('view_admin', auth()->user())
                                            <a class="btn btn-info btn-sm" href="{{route('User.edit', $user->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Редактировать
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @can('view_admin', auth()->user())
                            <p class="text-white text-xl text-center"><a
                                    class="btn btn-block btn-warning btn-lg text-white w-75"
                                    href="{{route('Group.edit', $group->id)}}">Обновить</a></p>
                            <p class="text-white text-xl">
                            <form action="{{route('Group.destroy', $group->id)}}" method="post"
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
