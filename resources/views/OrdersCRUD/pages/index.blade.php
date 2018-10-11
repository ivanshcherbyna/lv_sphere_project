@extends('OrdersCRUD.ordersPanel-index')

@section('title',"Все сделки")

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


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Список заказов из базы</div>

                <div class="panel-body">
                <div class="panel-content">

                    <table class="table table-hovered">
                        <thead>
                        <tr style="">
                            <th>ID</th>
                            <th>Вид услуги</th>
                            <th>Статус</th>
                            <th>Дата сделки</th>
                            <th>Клиент</th>
                            <th>Адрес</th>
                            <th style="width:250px">Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $order_)
                            <tr>
                                <th scope="row">{{$order_->id}}</th>
                                <td><a href="{{URL::to('orders-panel/'.$order_->id)}}"></a>{{$order_->service}}</td>
                                <td>{{$order_->status}}</td>
                                <td>{{$order_->date_order}}</td>
                                <td>{{$order_->name}}</td>
                                <td>{{$order_->client->adress}}</td>
                                <td style="width:250px">
                                    <a class="btn btn-success" href="{{URL::to('orders-panel/'.$order_->id).'/edit'}}" style="float: left;margin-right: 10px">Редкатировать</a>
                                    {!! Form::open(['method'=>"DELETE",
                                                    'route'=>['orders-panel.destroy', $order_->id]]) !!}
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
                    <a class="btn btn-primary" href="{{url( 'orders-panel/create' )}}">
                        Добавить
                    </a>


                    </a><!-- Не реализован пока что РОУТ-->
                    <a class="btn btn-default"  href="{{ url( '/') }}">На главную</a>
                </div>
            </div>
        </div>
    </div>

@endsection

