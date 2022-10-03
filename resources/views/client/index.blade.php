@extends('layouts.app')
@section('content')
    <br/>
    <div class="wrapper">
            <form action="" method="GET">
                @csrf
                <div class="flex-row d-flex justify-content-center">
                    <label for="start">Введите дату</label>
                    <div class="col-lg-2 col-18 px-1">
                        <div class="input-group input-daterange" style="width: 300px">
                            <input type="date" id="start" name="start" class="form-control text-left mr-2" >
                            <span class="fa fa-calendar" id="fa-1"></span>

                        </div>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">поиск</button>
            </form>
    </div>
    <div class="wrapper">
        <div class="containers">
            @if(!isset($workday))
                <h1> Пример как выглядит при вводе даты:</h1>
                <br/>
            @else
                <h1>Результат поиска</h1>
                <br/>
            @endif
            @if(isset($workday))
            @foreach($workday as $workdays)
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGJ_7Qxw5pSauBeR79cWJkEAKVn7PCUB33JA&usqp=CAU" alt="John" style="width:100%">
                    <h1>{{\App\Models\User::find($workdays->user_id)->name}}</h1>
                    <p class="title">{{\App\Models\User::find($workdays->user_id)->title}}</p>
                    <div class="faicon-flex">
                        <a class="hello" href="#"><i class="fa fa-dribbble"></i></a>
                        <a class="hello"><i class="fa fa-twitter"></i></a>
                        <a class="hello"><i class="fa fa-linkedin"></i></a>
                        <a class="hello"><i class="fa fa-facebook"></i></a>
                    </div>
                    <a href="{{route('client.user.show',[$workdays->user_id,$workdays->date_day])}}" class="buttons">Записаться</a>
                </div>
            @endforeach
                @else
                @foreach($user as $users)
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGJ_7Qxw5pSauBeR79cWJkEAKVn7PCUB33JA&usqp=CAU" alt="John" style="width:100%">
                    <h1>{{$users->name}}</h1>
                    <p class="title">{{$users->title}}</p>
                    <div class="faicon-flex">
                        <a class="hello" href="#"><i class="fa fa-dribbble"></i></a>
                        <a class="hello"><i class="fa fa-twitter"></i></a>
                        <a class="hello"><i class="fa fa-linkedin"></i></a>
                        <a class="hello"><i class="fa fa-facebook"></i></a>
                    </div>
                    <a href="" class="buttons">Записаться</a>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Вы записаны на дату: {{$recored}} ,на время: {{$time}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        @if(isset($recored))
        $(window).on('load', function () {
                $('#myModal').modal('show');
            });
        @endif
    </script>
@endsection
