@extends('layouts.layout')
@section('titulo','Usuarios')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Compromisos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Compromisos</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Descripción</th>
                        </tr>
                        @foreach($compromisos as $compromiso)
                        <tr>
                            <td>{{$compromiso->nombre}}</td>
                            <td>{{$compromiso->descripcion}}</td>
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