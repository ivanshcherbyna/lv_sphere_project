@extends('ClientsCRUD.clientsPanel-index')

@section('title',"Все клиенты")

@include('layouts.app')

@section('content')
    <style>
    table, th, td {
        border: 1px solid grey;
        border-collapse: collapse;
        padding: 5px;
         }
    table tr:nth-child(odd) {
         background-color: #f1f1f1;
        }
    table tr:nth-child(even) {
         background-color: #ffffff;
        }





    </style>
    <div class="container">
        <div class="row">
            <h2>Expandable when is Focus</h2>
            <h3>Mac Search Style</h3>
            <div class="span12">
                <form id="custom-search-form" class="form-search form-horizontal pull-right">
                    <div class="input-append span12">
                        <input type="text" class="search-query mac-style" placeholder="Search">
                        <button type="submit" class="btn"><i class="icon-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Список клиентов базы</div>

                <div class="panel-body">
                <div class="panel-content">

                    <table class="table table-hovered">
                        <thead>
                        <tr style="">
                            <th>ID</th>
                            <th>Название</th>
                            <th>код ОКПО</th>
                            <th>Контактное лицо</th>
                            <th>Контактный номер</th>
                            <th>Адрес</th>
                            <th style="width:250px">Управление</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($client as $client_)
                            <tr>
                                <th scope="row">{{$client_->id}}</th>
                                <td><a href="{{URL::to('clients-panel/'.$client_->id)}}">{{$client_->name}}</a></td>
                                <td>{{$client_->OKPO}}</td>
                                <td>{{$client_->contact_name}}</td>
                                <td>{{$client_->contact_phone}}</td>
                                <td>{{$client_->adress}}</td>
                                <td style="width:250px">
                                    <a class="btn btn-success" href="{{URL::to('clients-panel/'.$client_->id).'/edit'}}" style="float: left;margin-right: 10px">Редкатировать</a>
                                    {!! Form::open(['method'=>"DELETE",
                                                    'route'=>['clients-panel.destroy', $client_->id]]) !!}
                                    {!! Form::submit('Удалить',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                    {{$client->Links()}}
                </div>
                </div>
                <div class="panel-footer">
                    <a class="btn btn-primary" href="{{url( 'clients-panel/create' )}}">
                        Добавить
                    </a>


                    </a><!-- Не реализован пока что РОУТ-->
                    <a class="btn btn-default"  href="{{ url( '/') }}">На главную</a>
                </div>
            </div>
        </div>
    </div>

@endsection

