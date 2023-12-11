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
                        <h3 class="card-title">Создание группы</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('Group.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название группы</label>
                                <input name="name" type="text" class="form-control"
                                       placeholder="Введите название группы" value="{{old('name')}}">
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Курс</label>
                                <select class="form-control" name="course_id">
                                    @foreach($courses as $course)
                                        <option
                                            {{ old('course_id') == $course->id ? 'selected' : ''}}
                                            value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Участники</label>
                                <select class="duallistbox" multiple="multiple" name="users[]">
                                    @foreach($users as $user)
                                        <option
                                            @if(old('users') !== null)
                                                @foreach(old('users') as $userGroup)
                                                    {{$user->id == $userGroup ? ' selected' : ''}}
                                                @endforeach
                                            @endif
                                            value="{{$user->id}}">{{$user->role}} {{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection
