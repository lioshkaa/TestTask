@extends('layouts.app')
@section('content')

    <div class="wrapper">
        <div class="container">
            <br/>
            <div class="users">
                <h3>Запись клиента: </h3>
            </div>
    @foreach($recored as $recoreds)
        @if($recoreds->client_id !== auth()->user()->id)
            @if($recoreds->client_id===0)
                        <div></div>
                    @else
                        <div class="alert alert-success" role="alert">
                            <div class="flex">
                                <div class="flex-item">
                                    <a href="{{route('client.user.edit',$recoreds->id)}}" class="alert-link">{{$recoreds->start_record}} - {{$recoreds->stop_record}}</a>.
                                </div>
                                <div class="flex-item">
                                    <p>Свободно</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div class="alert alert-danger" role="alert">
                        <div class="flex">
                            <div class="flex-item">
                        <a href="" class="alert-link">{{$recoreds->start_record}} - {{$recoreds->stop_record}}</a>
                            </div>
                            <div class="flex-item">
                                <p>Занято</p>
                            </div>
                        </div>

                    </div>

                @endif
    @endforeach
            <a href="{{route('client')}}" class="btn btn-primary">Назад</a>
        </div>

    </div>

@endsection
