@extends('layouts.layout')
@section('titulo')
    Evento {{$evento->lugar}}
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Evento {{$evento->lugar}}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-check-circle-o"></i> Detalles del evento
                </div>
                <div class="panel-body">
                    <div class="col-lg-8">
                        <div class="well">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="lugar" class="col-lg-2 control-label">Lugar:</label>
                                    <div class="col-lg-10">
                                        <input name="lugar" type="text" class="form-control" id="lugar" value="{{$evento->lugar}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datetimepicker4" class="col-lg-2 control-label">Fecha:</label>
                                    <div class='input-group date col-lg-5' id='datetimepicker4' style="padding-left: 14px;">
                                        <input name="fecha" type='text' class="form-control" value="{{$evento->fecha_format}}" disabled/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="datetimepicker3" class="col-lg-2 control-label">Hora:</label>
                                    <div class='input-group date col-lg-5' id='datetimepicker3' style="padding-left: 14px;">
                                        <input name="hora" type='text' class="form-control" value="{{$evento->hora}}" disabled/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-time"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion" class="col-lg-2 control-label">Descripción:</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" id="descripcion" name="descripcion" disabled>{{$evento->descripcion}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paquete" class="col-lg-2 control-label">Paquete: </label>
                                    <div class="col-lg-4">
                                        {!! Form::text('estado',$evento->paquete->tipo,['class'=>'form-control','disabled']) !!}
                                    </div>
                                    <label for="" class="col-lg-2 control-label">Precio:</label>
                                    <div class="col-lg-3">
                                        {!! Form::text('estado',$evento->paquete->precio,['class'=>'form-control','disabled']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="compromiso" class="col-lg-2 control-label">Compromiso: </label>
                                    <div class="col-lg-4">
                                        {!! Form::text('estado',$evento->compromiso->nombre,['class'=>'form-control','disabled']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="compromiso" class="col-lg-2 control-label">Estado: </label>
                                    <div class="col-lg-4">
                                        {!! Form::text('estado',$evento->estado,['class'=>'form-control','disabled']) !!}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="well">
                            {!! Form::open(['route'=>['actualizarFilmador','id'=>$evento->id],'method'=>'POST']) !!}
                            <p class="text-center">Filmadores</p>
                            @include('eventos.partials.modalfilmador')
                            <ul class="list-group" id="master">
                                @foreach($evento->filmadores as $filmadores)
                                <li class="list-group-item" id="lista">{{$filmadores->nombre}}</li>
                                @endforeach
                            </ul>
                            <button type="submit" class="btn btn-success center-block" id="btn-hidden">Guardar</button>
                            {!! Form::close() !!}
                        </div>
                        <div class="well">
                            <p class="text-center">Opciones</p>
                            <a href="{{route('contratoPdf',['id_con'=>$evento->contrato->id,'id_pago'=>$data[0],'id_comp'=>$evento->compromiso->id,'id_evento'=>$evento->id])}}" target="_blank" class="btn btn-block btn-info"><i class="fa fa-file-pdf-o"></i> Ver contrato</a>
                            <a href="" class="btn btn-block btn-warning"><i class="fa fa-edit"></i> Editar</a>
                            <a href="" class="btn btn-block btn-danger"><i class="fa fa-remove"></i> Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#btn-hidden').hide();
        $(document).ready(function(){
           if(!$('#lista').length){
                $(".list-group").append("<li class='list-group-item'>Filmador no definido <a class='pull-right' data-toggle='modal' data-target='#modal'>Definir</a></li>")
                $('#btn-hidden').show();
           }
        });
    </script>
@endsection