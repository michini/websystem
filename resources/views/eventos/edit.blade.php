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

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="well">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection