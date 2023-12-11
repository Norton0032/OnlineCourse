@extends('layouts.welcome')
@section('header')
    Курсы
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <!-- left column -->
            <div class="mx-auto w-75">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title w-100" style="font-size: x-large">Обновление курса</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('Course.update', $course->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body" style="font-size: large">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Название курса</label>
                                <input name="name" type="text" class="form-control"  placeholder="Введите название курса" value="{{$course->name}}">
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Описание</label>
                                <input name="description" type="text" class="form-control"  placeholder="Введите описание" value="{{$course->description}}">
                                @error('description')
                                <p>{{$message}}</p>
                                @enderror
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


