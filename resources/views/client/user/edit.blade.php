@extends('layouts.app')
@section('content')
    <div class="wrapper">
        <div class="container">
            <div class="users">
                <h4>Подтвердите запись: </h4>
                <p>{{$user->start_record}} - {{$user->stop_record}}</p>
            </div>
    <form action="{{route('client.user.update',$user->id)}}" METHOD="post">
    @csrf
    @method('patch')
        <input type="submit" value="Подтвердить выбор" class="btn btn-success"/>
    </form>
        </div>
    </div>
@endsection
