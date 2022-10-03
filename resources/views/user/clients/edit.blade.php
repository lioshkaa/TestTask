@extends('layouts.user')
@section('content')
<form action="{{route('user.clients.update',$recored->id)}}" method="post">
    @csrf
    @method('patch')
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
                <tr>
                    <td>{{\App\Models\User::find($recored->client_id)->name}}</td>
                    <td>{{$recored->date_day}}</td>
                    <td>{{$recored->start_record}} - {{$recored->stop_record}}</td>
                    <td>
                        <select class="form-select" aria-label="Default select example" name="reception">

                            @if($recored->reception === \App\Enum\ReceptionEnum::Reception_DONE->value)
                                <option selected value="{{\App\Enum\ReceptionEnum::Reception_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_DONE->status()}}</option>
                                <option value="{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->status()}}</option>
                                <option value="{{\App\Enum\ReceptionEnum::Client_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Client_NOT_DONE->status()}}</option>
                            @elseif($recored->reception === \App\Enum\ReceptionEnum::Reception_NOT_DONE->value)
                                <option value="{{\App\Enum\ReceptionEnum::Reception_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_DONE->status()}}</option>
                                <option selected value="{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->status()}}</option>
                                <option value="{{\App\Enum\ReceptionEnum::Client_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Client_NOT_DONE->status()}}</option>
                            @elseif($recored->reception === \App\Enum\ReceptionEnum::Client_NOT_DONE->value)
                                <option value="{{\App\Enum\ReceptionEnum::Reception_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_DONE->status()}}</option>
                                <option value="{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->status()}}</option>
                                <option selected value="{{\App\Enum\ReceptionEnum::Client_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Client_NOT_DONE->status()}}</option>
                            @else
                                <option value="{{\App\Enum\ReceptionEnum::Reception_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_DONE->status()}}</option>
                                <option value="{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Reception_NOT_DONE->status()}}</option>
                                <option value="{{\App\Enum\ReceptionEnum::Client_NOT_DONE->value}}">{{\App\Enum\ReceptionEnum::Client_NOT_DONE->status()}}</option>

                            @endif

                        </select>
                    </td>
                </tr>
        </tbody>
    </table>

    <div>
       <input type="submit" class="btn btn-primary" value="Редактировать">
    </div>

</form>
<br/>
<a href="{{route('user.clients.index')}}" class="btn btn-primary">Назад</a>

@endsection
