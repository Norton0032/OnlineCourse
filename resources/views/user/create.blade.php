@extends('layouts.welcome')
@section('header')
    Пользователи
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row ">
            <!-- left column -->
            <div class="mx-auto w-75">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Создание пользователя</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('User.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя пользователя</label>
                                <input name="name" type="text" class="form-control"
                                       placeholder="Введите имя пользователя" value="{{old('name')}}">
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Почта</label>
                                <input name="email" type="text" class="form-control" placeholder="Введите почту"
                                       value="{{old('email')}}" autocomplete="on">
                                @error('email')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password" placeholder="Введите пароль">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Подтвердите пароль</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                                       required autocomplete="new-password" placeholder="Введите пароль">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Роль</label>
                                <select class="form-control" name="role">
                                    <option value="user">Ученик</option>
                                    <option value="curator">Куратор</option>
                                    <option value="admin">Администратор</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Группы</label>
                                <select class="duallistbox" multiple="multiple" name="groups[]">
                                    @foreach($groups as $group)
                                        <option
                                            @if(old('groups') !== null)
                                                @foreach(old('groups') as $userGroup)
                                                    {{$group->id == $userGroup ? ' selected' : ''}}
                                                @endforeach
                                            @endif
                                            value="{{$group->id}}">{{$group->name}}</option>
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
