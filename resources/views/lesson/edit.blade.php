@extends('layouts.welcome')
@section('header')
    Уроки
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <!-- left column -->
            <div class="mx-auto w-75">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title w-100" style="font-size: x-large">Обновление урока</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('Lesson.update', $lesson->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body" style="font-size: large">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название урока</label>
                                <input name="name" type="text" class="form-control" placeholder="Введите название курса"
                                       value="{{$lesson->name}}">
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Курс</label>
                                <select class="form-control" name="course_id">
                                    @foreach($courses as $course)
                                        <option
                                            value="{{$course->id}}" {{$course->id === $lesson->course_id ? ' selected' : ''}}>
                                            {{$course->name}}
                                        </option>
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


