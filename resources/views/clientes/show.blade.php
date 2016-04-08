@extends('layouts.layout')
@section('titulo','Usuario')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Información cliente {{$cliente->nombre}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-user"></i> Informacion del cliente
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            {!! Form::label('nombre','Nombre:',['class'=>'control-label col-lg-2']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('nombre',$cliente->nombre,['class'=>'form-control','disabled']) !!}
                            </div>
                            {!! Form::label('creado','Creado:',['class'=>'control-label col-lg-2']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('nombre',$cliente->created,['class'=>'form-control','disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('apellido','Apellido:',['class'=>'control-label col-lg-2']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('apellido',$cliente->apellido,['class'=>'form-control','disabled']) !!}
                            </div>
                            {!! Form::label('eventos','Eventos:',['class'=>'control-label col-lg-2']) !!}
                            <div class="col-lg-2">
                                <a href="{{route('clientContracts',$cliente->id)}}" class="btn btn-link">Todos: <span class="badge">{{$evento_cliente}}</span></a>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('celular','Celular:',['class'=>'control-label col-lg-2']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('celular',$cliente->celular,['class'=>'form-control','disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('direccion','Direccion:',['class'=>'control-label col-lg-2']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('direccion',$cliente->direccion,['class'=>'form-control','disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('familia','Familia:',['class'=>'control-label col-lg-2']) !!}
                            <div class="col-lg-4">
                                {!! Form::text('familia',$cliente->familia,['class'=>'form-control','disabled']) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-check"></i> Opciones
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@endsection