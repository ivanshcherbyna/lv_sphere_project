@extends('OrdersCRUD.ordersPanel-index')

@section('title',"Показать сделку")

@include('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Информация о сделке  </div>
                    <div class="panel-heading text-center">{{$client->name}}</div>
                    <div class="panel-body">

                        <h2>Контактное лицо: {{$client->contact_name}}</h2>
                        <h2>Контактный телефон: {{$client->contact_phone}}</h2>
                        <p>Адрес: {{$client->adress}}</p>
                        <p>код ОКПО: {{$client->OKPO}}!</p>
                        <p>создан {{$client->created_at}}</p>
                        <p class="nv-minValue">id {{$client->id}}</p>
                        {!! Form::open(['method'=>"DELETE",
                    'route'=>['clients-panel.destroy', $client->id]]) !!}
                        {!! Form::submit('Удалить',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-primary" href="{{ 'orders-panel/create' }}">Добавить еще... </a>
                    <a class="btn btn-success" href="{{URL::to('orders-panel/'.$client->id).'/edit'}}">Редактировать</a>
                    <a class="btn btn-default"  href="{{ URL::to('orders-panel/') }}">Вернуться</a>

                </div>
            </div>
        </div>

    </div>

@endsection