@extends('layouts.layout')
@section('titulo','Lista de Eventos')
@section('css')
    <style>
        #nav.affix {
            position: fixed;
            top: 50px;
            width: 18%;
            z-index:10;
        }
    </style>
@endsection
@section('contenido')
    <div class="row" id="cabecera">
        <div class="col-lg-12">
            <h1 class="page-header">
                Lista de Eventos
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9" role="main">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-envelope"></i> Eventos</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4 class="">Hay {!! $eventos->total() !!} registros en total</h4>
                        </div>
                        <div class="col-lg-4 col-lg-offset-4">
                            <h4 class="pull-right">Hay {!! $eventos->count() !!} registros en la vista</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="well text-center">
                                @foreach($compromisos as $compromiso)
                                <a href="{{route('filter',[$compromiso->nombre,'id'=>$compromiso->id])}}" class="btn btn-primary btn-xs" style="margin: 2px;">{{$compromiso->nombre}} <span class="badge">{{$compromiso->cantidad}}</span></a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @foreach($eventos as $evento)
                        <div class="col-sm-5 col-md-3">
                            <div class="thumbnail">

                                <div class="caption">
                                    <h4>{{$evento->lugar}}</h4>
                                    @if(!isset($evento->nombre))
                                            <p>{{$evento->contrato->cliente->nombre}}</p>
                                    @else
                                        <p>{{$evento->nombre}}</p>
                                    @endif
                                    <small>{{$evento->fecha}}</small>
                                    <p><a href="{{route('admin.evento.show',$evento->id)}}" class="btn btn-primary" role="button">Ver</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-5">
                        {!! $eventos->links() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3" role="complementary">
            <nav class="" data-offset-top="60" data-offset-bottom="200" id="nav">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-pencil-square-o"></i> Busquedas</div>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Buscar por lugar
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {!! Form::open(['route'=>'admin.evento.index','method'=>'GET','role'=>'form']) !!}
                                                {!! Form::label('search','Buscar por lugar') !!}
                                                {!! Form::text('lugar',null,['class'=>'form-control','id'=>'search','placeholder'=>'lugar de evento']) !!}
                                                <br>
                                                {!! Form::submit('Buscar',['class'=>'btn btn-primary pull-right btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Buscar por cliente
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {!! Form::open(['route'=>'clientes','method'=>'GET','role'=>'form']) !!}
                                                {!! Form::label('cliente','Buscar por cliente') !!}
                                                {!! Form::text('cliente',null,['class'=>'form-control','id'=>'cliente','placeholder'=>'nombre del cliente']) !!}
                                                <br>
                                                {!! Form::submit('Buscar',['class'=>'btn btn-primary pull-right btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Buscar por filmador
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                {!! Form::open(['route'=>'clientes','method'=>'GET','role'=>'form']) !!}
                                                {!! Form::label('cliente','Buscar por filmador') !!}
                                                {!! Form::text('cliente',null,['class'=>'form-control','id'=>'cliente','placeholder'=>'nombre del cliente']) !!}
                                                <br>
                                                {!! Form::submit('Buscar',['class'=>'btn btn-primary pull-right btn-xs']) !!}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <i class="fa fa-comments"> Filtros</i>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                                <a href="{{route('admin.evento.index')}}" class="btn-block btn btn-primary">Todos los eventos</a>
                                <a href="{{route('conFilmador')}}" class="btn-block btn btn-success">Eventos con filmador</a>
                                <a href="{{route('sinFilmador')}}" class="btn-block btn btn-danger">Eventos sin filmador</a>
                                <a href="{{route('eventoProximo')}}" class="btn-block btn btn-info">Eventos Proximos</a>
                                <a href="{{route('eventoPasado')}}" class="btn-block btn btn-info">Eventos Pasados</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#nav').affix({
            offset: {
                top: $('#cabecera').height()
            }
        });
    </script>
@endsection