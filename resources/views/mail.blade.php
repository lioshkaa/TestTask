@if(empty($data))
@foreach($data as $reception)
    @if(isset($reception))

        @if($reception->reception == \App\Enum\ReceptionEnum::Reception_NOT_DONE->value)

        <p> У {{App\Models\User::find($reception->user_id)->name}} время : {{$reception->start_record}} - {{$reception->stop_record}} на дату: {{$reception->date_day}} {{\App\Enum\ReceptionEnum::Reception_NOT_DONE->status()}}</p>


        @elseif($reception->reception == \App\Enum\ReceptionEnum::Client_NOT_DONE->value)

        <p> У {{App\Models\User::find($reception->user_id)->name}} время : {{$reception->start_record}} - {{$reception->stop_record}} на дату: {{$reception->date_day}} {{\App\Enum\ReceptionEnum::Client_NOT_DONE->status()}}</p>
        @endif
    @endif
@endforeach
@else
    <h5>Записи отсутсвуют</h5>
@endif
