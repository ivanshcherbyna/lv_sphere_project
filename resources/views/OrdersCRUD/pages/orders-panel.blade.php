@extends('ClientsCRUD.clientsPanel-index')

@section('title',"Панель Клиенты")

@include('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Панель работы с клиентами</div>

                    <div class="panel-body">
                        Выберите операцию с клиентами!
                    </div>

                </div>
                <div class="panel-footer">
                    <a class="btn btn-primary" href="{{url( 'clients-panel/create' )}}">
                        Добавить
                    </a>
                    <a class="btn btn-default" href="{{ 'clients-panel/' }}">
                        Открыть список</a>
                    <a class="btn btn-default"  href="{{ url( '/') }}">На главную</a>
                </div>
            </div>
        </div>
    </div>
@endsection