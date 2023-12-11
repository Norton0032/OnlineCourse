@extends('layouts.welcome')
@section('header')
    Пользователи
@endsection
@section('content')

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                @can('view_admin', auth()->user())
                                    <th>Id</th>
                                @endcan
                                <th>Имя пользователя</th>
                                <th>Номера групп</th>
                                <th>Роль</th>
                                @can('view_curator', auth()->user())
                                    <th>Почта</th>
                                @endcan
                                @can('view_admin', auth()->user())
                                    <th>Дата создания</th>
                                    <th>Дата изменений</th>
                                @endcan
                                @can('view_curator', auth()->user())
                                    <th>Подробнее</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="without_hover">
                                    @can('view_admin', auth()->user())
                                        <td>{{$user->id}}</td>
                                    @endcan
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @foreach($user->groups as $group)
                                            {{$group->id}}
                                        @endforeach
                                    </td>
                                    <td>{{$user->role}}</td>
                                    @can('view_curator', auth()->user())
                                        <td>{{$user->email}}</td>
                                    @endcan
                                    @can('view_admin', auth()->user())
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>
                                    @endcan
                                    @can('view_curator', auth()->user())
                                        <td><a href="{{route('User.show', $user->id)}}"
                                               class="btn btn-block bg-gradient-primary">Поробнее</a></td>
                                    @endcan
                                </tr>
                            @endforeach

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        @can('view_admin', auth()->user())
            <div class="row w-25 mb-3 ml-1">
                <a href="{{route('User.create')}}" class="btn btn-block btn-primary btn-lg">Создать</a>
            </div>
        @endcan
    </div>
@endsection

