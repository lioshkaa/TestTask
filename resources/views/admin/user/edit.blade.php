@extends('layouts.admin')
@section('content')
    <div class="wrapper">
        <form action="{{route('admin.user.update',$user->id)}}" METHOD="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" class="form-control" placeholder="Enter email" value="{{$user->email}}" name="email">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Enter name" id="name" value="{{$user->name}}" name="name">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter password" id="password" value="{{$user->password}}" name="password">
            </div>
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" placeholder="Enter title" id="title" value="{{$user->title}}" name="title">
            </div>
            <div class="form-group">
                <select class="form-select" id="role_id" name="role_id">
                    <option value="2">Пользователь</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
