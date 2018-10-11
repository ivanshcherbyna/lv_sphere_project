@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Информационная панель</div>

                <div class="panel-body">
                    Вы успешно авторизированы!
                </div>
                <div class="panel-footer col-lg">
                    <a class="btn btn-default"  href="{{ URL::to('/') }}">На главную</a>
                    <a class="btn btn-success" href="{{url('/clients-panel/')}}">Клиенты</a>
                    <a class="btn btn-primary" href="{{url('/orders-panel/')}}">Сделки</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
