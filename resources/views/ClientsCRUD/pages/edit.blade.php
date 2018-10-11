@extends('ClientsCRUD.clientsPanel-index')

@section('title',"Редактировать клиента")

@include('layouts.app')

@section('content')
    <h1 class="col-md-9 col-md-offset-1"> Редактирование клиента</h1>
<div class="col-md-12">
    {!! Form::model($client,array('route' => array('clients-panel.update', $client->id), 'method'=>'PUT')) !!}
    <div class="form-group col-md-6">
        <div class="col-md-2">
            {{ Form::label('name','Название клиента:') }}
        </div>
        {{Form::text('name',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group col-md-4">
        <div class="col-md-4">
            {{ Form::label('OKPO','Код ОКПО клиента:') }}
        </div>
        {{Form::number('OKPO',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group col-lg-6">
        <div class="col-md-3">
            {{ Form::label('contact_name','Контактное лицо клиента:') }}
        </div>
        {{Form::text('contact_name',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group col-lg-4">
        <div class="col-md-8">
            {{ Form::label('contact_phone','Контактный телефон клиента:') }}
        </div>
        {{Form::number ('contact_phone',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group col-lg-10">
        <div class="col-md-10">
            {{ Form::label('adress','Адрес клиента:') }}
        </div>
        {{Form::text('adress',null,['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            {{Form::submit('Сохранить клиента в базе',['class'=>'btn btn-primary','data-toggle'=>'modal','data-target'=>'#myModal'])}}
            <a class="btn btn-default" href="{{URL::to('clients-panel/') }}">
                Открыть список</a>
            <a class="btn btn-default"  href="{{ url( '/') }}">На главную</a>
        </div>
    </div>
    {!! Form::close() !!}
</div>
    <div class="container">

        <!-- Trigger the modal with a button -->
       <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Small Modal</button>-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Обработка</h4>
                    </div>
                    <div class="modal-body">
                        <p>Запись успешно добавлена в базу!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection