@extends('layouts.welcome')
@section('content')
    <div class="row">
        <div class="mx-auto p-5 size-32" style="width: 60%">
            <div class="card bg-">
                <div class="card-body">
                    <div>
                        <h2 class="text-white text-xxl text-center"><b>{{auth()->user()->name}}</b></h2>
                        <p class="text-white text-lg"><b>Почта: </b> {{auth()->user()->email}} </p>
                        <p class="text-white text-lg"><b>Номера групп: </b>
                            @foreach(auth()->user()->groups as $group)
                                @can('view_curator', auth()->user())
                                    <a href="{{route('Group.show', $group->id)}}" style="text-decoration: none">
                                        @endcan
                                        {{$group->id}}
                                        @can('view_curator', auth()->user())
                                    </a>
                                @endcan
                            @endforeach
                        </p>
                        <p class="text-white text-lg"><b>Роль: </b> {{auth()->user()->role}} </p>
                        <p class="text-white text-lg"><b>Дата создания: </b> {{auth()->user()->created_at}} </p>
                        <p class="text-white text-lg"><b>Дата изменения: </b> {{auth()->user()->updated_at}}</p>
                        <p class="text-white text-xl text-center"><a
                                class="btn btn-block btn-warning btn-lg text-white w-75"
                                href="{{route('Home.edit')}}">Обновить</a></p>
                        <p class="text-white text-xl">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
