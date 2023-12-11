@extends('layouts.welcome')
@section('header')
    Группы
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <!-- left column -->
            <div class="mx-auto w-75">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title w-100" style="font-size: x-large">Обновление группы</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('Group.update', $group->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body" style="font-size: large">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название группы</label>
                                <input name="name" type="text" class="form-control"
                                       placeholder="Введите название группы" value="{{$group->name}}">
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <select class="form-control" name="course_id">
                                @foreach($courses as $course)
                                    <option
                                        value="{{$course->id}}" {{$course->id === $group->course_id ? ' selected' : ''}}>
                                        {{$course->name}}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <label>Участники</label>
                                <select class="duallistbox" multiple="multiple" name="users[]">
                                    @foreach($users as $user)
                                        <option
                                            @foreach($group->users as $userGroup)
                                                {{$user->id === $userGroup->id ? ' selected' : ''}}
                                            @endforeach
                                            value="{{$user->id}}" >
                                            {{$user->role}} {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection


