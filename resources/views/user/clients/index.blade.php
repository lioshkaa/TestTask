@extends('layouts.user')
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Имя клиента</th>
            <th scope="col">Дата</th>
            <th scope="col">Время записи</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($recored as $recored)
            @if(isset($recored->client_id))
                @if($recored->client_id !=0)
        <tr>
            <td>{{\App\Models\User::find($recored->client_id)->name}}</td>
            <td>{{$recored->date_day}}</td>
            <td>{{$recored->start_record}} - {{$recored->stop_record}}</td>
            <td><a href="{{route('user.clients.edit',$recored->id)}}" class="btn btn-primary">Редактировать</a></td>
        </tr>
                @endif
            @endif
        @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{route('user')}}" class="btn btn-primary">Назад</a>
    </div>
@endsection
