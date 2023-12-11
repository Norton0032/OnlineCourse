@extends('layouts.welcome')
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <!-- left column -->
            <div class="mx-auto w-75">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title w-100" style="font-size: x-large">Обновление пользователя</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('Home.update')}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body" style="font-size: large">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя пользователя</label>
                                <input name="name" type="text" class="form-control"  placeholder="Введите название курса" value="{{auth()->user()->name}}">
                                @error('name')
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


