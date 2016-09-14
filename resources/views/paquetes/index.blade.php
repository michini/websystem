@extends('layouts.layout')
@section('titulo','Paquetes')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Paquetes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Paquetes disponibles</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Precio</th>
                            <th class="text-center">Descripción</th>
                        </tr>
                        @foreach($paquetes as $paquete)
                        <tr>
                            <td>{{$paquete->tipo}}</td>
                            <td>{{$paquete->precio}}</td>
                            <td>{{$paquete->descripcion}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Opciones</div>
                <div class="panel-body">

                </div>
            </div>
        </div>

    </div>
@endsection