@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div class="container">
        <form action="{{route('admin.client.store')}}" METHOD="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Почта</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleName" class="form-label">Имя</label>
                <input type="text" class="form-control" name="name" id="exampleName">
            </div>
            <div class="mb-3">
                <select class="form-select" id="validationCustom04" name="role_id">
                    <option value="{{\App\Enum\UserRoleEnum::CLIENT->value}}">Клиент</option>
                </select>
            </div>
            <input type="submit" value="Создать" class="btn btn-primary">
        </form>
    </div>
</div>
@endsection
