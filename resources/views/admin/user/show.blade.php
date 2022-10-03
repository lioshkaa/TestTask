@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <a href="{{route('admin.user.edit',$user->id)}}">Изменить</a>

        <form action="{{route('admin.user.delete',$user->id)}}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-primary" value="Удалить">
        </form>
        <div class="containers">
                <div class="card">
                    <img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGJ_7Qxw5pSauBeR79cWJkEAKVn7PCUB33JA&usqp=CAU" alt="John" style="width:100%">
                    <h1>{{$user->name}}</h1>
                    <p class="title">{{$user->title}}</p>
                    <div class="faicon-flex">
                        <a class="hello" href="#"><i class="fa fa-dribbble"></i></a>
                        <a class="hello"><i class="fa fa-twitter"></i></a>
                        <a class="hello"><i class="fa fa-linkedin"></i></a>
                        <a class="hello"><i class="fa fa-facebook"></i></a>
                    </div>
                    <a href="" class="buttons">Записаться</a>
                </div>
        </div>
    </div>
@endsection
