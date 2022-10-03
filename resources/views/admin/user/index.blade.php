@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <div class="containers">

            @foreach($user as $users)
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGJ_7Qxw5pSauBeR79cWJkEAKVn7PCUB33JA&usqp=CAU" alt="John" style="width:100%">
                    <h1>{{$users->name}}</h1>
                    <p class="title">{{$users->title}}</p>
                    @foreach($workday as $day)
                    @if($day->user_id == $users->id)
                                <p class="">Дата работы:{{$day->date_day}}</p>
                                <p class="time">Время работы: {{$day->start}} - {{$day->end}}</p>
                        @endif
                    @endforeach
                    <div class="faicon-flex">
                        <a class="hello" href="#"><i class="fa fa-dribbble"></i></a>
                        <a class="hello"><i class="fa fa-twitter"></i></a>
                        <a class="hello"><i class="fa fa-linkedin"></i></a>
                        <a class="hello"><i class="fa fa-facebook"></i></a>
                    </div>
                    <a href="{{route('admin.user.show',$users->id)}}" class="buttons">Редактировать</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
