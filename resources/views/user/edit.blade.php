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
                        <h3 class="card-title w-100" style="font-size: x-large">Обновление пользователя</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{route('User.update', $user->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="card-body" style="font-size: large">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя пользователя</label>
                                <input name="name" type="text" class="form-control"  placeholder="Введите название курса" value="{{$user->name}}">
                                @error('name')
                                <p>{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Роль</label>
                                <select class="form-control" name="role">
                                    <option value="user" {{$user->role === 'user' ? ' selected' : ''}}>Ученик</option>
                                    <option value="curator" {{$user->role === 'curator' ? ' selected' : ''}}>Куратор</option>
                                    <option value="admin" {{$user->role === 'admin' ? ' selected' : ''}}>Администратор</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Группы</label>
                                <select class="duallistbox" multiple="multiple" name="groups[]">
                                    @foreach($groups as $group)
                                        <option
                                            @foreach($user->groups as $userGroup)
                                                {{$group->id === $userGroup->id ? ' selected' : ''}}
                                            @endforeach
                                            value="{{$group->id}}">{{$group->name}}</option>
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


