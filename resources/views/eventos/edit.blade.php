@extends('layouts.layout')
@section('titulo')
    Evento {{$evento->lugar}}
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/timepicker/css/bootstrap-datetimepicker.css')}}">
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
        {!! Form::model($evento,['route'=>['admin.evento.update',$evento->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-check-circle-o"></i> Detalles del evento
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="lugar" class="col-lg-2 control-label">Lugar:</label>
                        <div class="col-lg-10">
                            {!! Form::text('lugar',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker4" class="col-lg-2 control-label">Fecha:</label>
                        <div class='input-group date col-lg-5' id='datetimepicker4' style="padding-left: 14px;">
                            {!! Form::text('fecha',null,['class'=>'form-control']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker3" class="col-lg-2 control-label">Hora:</label>
                        <div class='input-group date col-lg-5' id='datetimepicker3' style="padding-left: 14px;">
                            {!! Form::text('hora',null,['class'=>'form-control']) !!}
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-lg-2 control-label">Descripción:</label>
                        <div class="col-lg-10">
                            {!! Form::textarea('descripcion',null,['class'=>'form-control','rows'=>'3']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paquete" class="col-lg-2 control-label">Paquete: </label>
                        <div class="col-lg-4">
                            <select name="paquete" id="" class="form-control">
                                @foreach($paquetes as $paquete)
                                    @if($evento->paquete->tipo === $paquete->tipo)
                                        <option value="{{$paquete->id}}" selected>{{$paquete->tipo}}</option>
                                    @else
                                        <option value="{{$paquete->id}}">{{$paquete->tipo}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <label for="" class="col-lg-2 control-label">Precio:</label>
                        <div class="col-lg-3">
                            {!! Form::text('estado',$evento->paquete->precio,['class'=>'form-control','disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="compromiso" class="col-lg-2 control-label">Compromiso: </label>
                        <div class="col-lg-4">
                            <select name="compromiso" id="" class="form-control">
                                @foreach($compromisos as $compromiso)
                                    @if($evento->compromiso->nombre === $compromiso->nombre)
                                        <option value="{{$compromiso->id}}" selected>{{$compromiso->nombre}}</option>
                                    @else
                                        <option value="{{$compromiso->id}}">{{$compromiso->nombre}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="compromiso" class="col-lg-2 control-label">Estado: </label>
                        <div class="col-lg-4">
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="" selected disabled>Selecione nuevo estado</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Editando">Editando</option>
                                <option value="Entregado">Entregado</option>
                                <option value="No entregado">No entregado</option>
                                <option value="Finalizazo">Finalizazo</option>
                                <option value="Por entregar">Por entregar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Opciones</div>
                <div class="panel-body">
                    <p class="text-center">Filmadores del evento</p>
                    <ul class="list-group" id="master">
                        @foreach($evento->filmadores as $filmador)
                            <li class="list-group-item" id="lista"><i onclick='$(this).parent().remove()' class='fa fa-remove pull-right btn btn-xs btn-danger'></i>{{$filmador->nombre}}</li>
                        @endforeach
                    </ul>
                    <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal">Cambiar</a>
                    @include('eventos.partials.modalfilmador')
                </div>
            </div>
            <div class="well">
                <button type="submit" class="btn btn-success btn-lg center-block">Actualizar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('js')
    <script src="{{asset('plugins/timepicker/js/moment.min.js')}}"></script>
    <script src="{{asset('plugins/timepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script>
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'YYYY/MM/DD'
            });
        });

        $('.chk').on('click',function(){
            if($(this).is(':checked') ){
                $("#desa").hide()
                $("#lista").remove()
                $('.list-group').append("<li id='remove' class='list-group-item'>"+$(this).attr('text')+"<i onclick='$(this).parent().remove()' class='fa fa-remove pull-right btn btn-xs btn-danger'></i></li>");
            }
            else if(!$(this).is(':checked')){
                $("#remove").remove();
            }
        });
        $(document).ready(function(){
            if(!$('#lista').length){
                $(".list-group").append("<li id='desa' class='list-group-item'>Filmador no definido <a class='pull-right' data-toggle='modal' data-target='#modal'></a></li>")
                $('#btn-hidden').show();
            }
        });
    </script>
@endsection