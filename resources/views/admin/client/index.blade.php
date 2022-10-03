@extends('layouts.admin')
@section('content')


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Имя клиента</th>
            <th scope="col">Имя пользователя</th>
            <th scope="col">Дата</th>
            <th scope="col">Время записи</th>
            <th scope="col">Статус приема</th>
        </tr>
        </thead>
        <tbody>

        @foreach($recored as $recoreds)
            @if(isset($recoreds->client_id))
                @if($recoreds->client_id !=0)
                <tr>
                    <td>{{\App\Models\User::find($recoreds->client_id)->name}}</td>
                    <td>{{\App\Models\User::find($recoreds->user_id)->name}}</td>
                    <td>{{$recoreds->date_day}}</td>
                    <td>{{$recoreds->start_record}} - {{$recoreds->stop_record}}</td>
                    @if($recoreds->reception == \App\Enum\ReceptionEnum::Reception_DONE->value)
                        <td>{{\App\Enum\ReceptionEnum::Reception_DONE->status()}}</td>
                    @elseif($recoreds->reception == \App\Enum\ReceptionEnum::Reception_NOT_DONE->value)
                        <td>{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->status()}}</td>
                    @elseif($recoreds->reception == \App\Enum\ReceptionEnum::Client_NOT_DONE->value)
                        <td>{{\App\Enum\ReceptionEnum::Client_NOT_DONE->status()}}</td>
                    @endif
                </tr>
                @endif
            @endif
        @endforeach

        </tbody>
    </table>
    <a href="{{route('admin.client.create')}}" class="btn btn-primary">Создать клиента</a>
    <div>
    </div>


@endsection
