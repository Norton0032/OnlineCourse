@extends('layouts.welcome')
@section('header')
    Группы
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
                                <th>Название группы</th>
                                <th>Название курса</th>
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
                            @foreach($groups as $group)
                                <tr class="without_hover">
                                    @can('view_admin', auth()->user())
                                        <td>{{$group->id}}</td>
                                    @endcan
                                    <td>{{$group->name}}</td>
                                    <td>{{$group->course->name}}</td>
                                    @can('view_admin', auth()->user())
                                        <td>{{$group->created_at}}</td>
                                        <td>{{$group->updated_at}}</td>
                                    @endcan
                                    @can('view_curator', auth()->user())
                                        <td><a href="{{route('Group.show', $group->id)}}"
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
                <a href="{{route('Group.create')}}" class="btn btn-block btn-primary btn-lg">Создать</a>
            </div>
        @endcan
    </div>
@endsection

