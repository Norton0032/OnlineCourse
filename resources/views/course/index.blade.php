@extends('layouts.welcome')
@section('header')
    Курсы
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
                                <th>Название курса</th>
                                <th>Описание</th>
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
                            @foreach($courses as $course)
                                <tr class="without_hover">
                                    @can('view_admin', auth()->user())
                                        <td>{{$course->id}}</td>
                                    @endcan
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->description}}</td>
                                    @can('view_admin', auth()->user())
                                        <td>{{$course->created_at}}</td>
                                        <td>{{$course->updated_at}}</td>
                                    @endcan
                                    @can('view_curator', auth()->user())
                                        <td><a href="{{route('Course.show', $course->id)}}"
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
                <a href="{{route('Course.create')}}" class="btn btn-block btn-primary btn-lg">Создать</a>
            </div>
        @endcan
    </div>
@endsection

