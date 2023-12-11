@extends('layouts.welcome')
@section('header')
    Уроки
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
                                <th>Название урока</th>
                                <th>Название курса</th>
                                @can('view_curator', auth()->user())
                                    <th>Дата создания</th>
                                    <th>Дата изменений</th>
                                    <th>Подробнее</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lessons as $lesson)
                                <tr class="without_hover">
                                    @can('view_admin', auth()->user())
                                        <td>{{$lesson->id}}</td>
                                    @endcan
                                    <td>{{$lesson->name}}</td>
                                    <td>{{$lesson->course->name}}</td>
                                    @can('view_curator', auth()->user())
                                        <td>{{$lesson->created_at}}</td>
                                        <td>{{$lesson->updated_at}}</td>
                                        <td><a href="{{route('Lesson.show', $lesson->id)}}"
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
                <a href="{{route('Lesson.create')}}" class="btn btn-block btn-primary btn-lg">Создать</a>
            </div>
        @endcan
    </div>
@endsection

