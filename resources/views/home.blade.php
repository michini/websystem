@extends('layouts.layout')
@section('titulo')
    Inicio
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('plugins/calendar/css/fullcalendar.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/calendar/css/fullcalendar.print.css')}}" media="print">
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                S.I.S.C.E. <small>Sistema de Control de Eventos</small>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-check-circle-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$eventos_pasado}}</div>
                            <div>Eventos pasados</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('eventoPasado')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver mas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$eventos_hoy}}</div>
                            <div>Eventos para hoy</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('eventoHoy')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver mas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-arrow-circle-o-right fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$eventos_proximo}}</div>
                            <div>Eventos próximos</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('eventoProximo')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver mas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-film fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$eventos_total}}</div>
                            <div>Eventos</div>
                        </div>
                    </div>
                </div>
                <a href="{{route('admin.evento.index')}}">
                    <div class="panel-footer">
                        <span class="pull-left">Ver mas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-calendar"></i> Calendario de eventos</div>
                <div class="panel-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-calendar"></i> Proximos eventos</div>
                <div class="panel-body">
                    @foreach($eventos as $evento)
                        <a href="{{route('admin.evento.show',$evento->id)}}"><div class="well">{{$evento->lugar}}</div></a>
                    @endforeach
                    <div class="pull-right"><a href="{{route('admin.evento.index')}}" class="btn btn-primary">Ver todos</a></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('plugins/calendar/js/moment.min.js')}}"></script>
    <script src="{{asset('plugins/calendar/js/fullcalendar.js')}}"></script>
    <script src="{{asset('plugins/calendar/js/lang-all.js')}}"></script>
    <script src="{{asset('plugins/calendar/js/app.js')}}"></script>
@endsection
