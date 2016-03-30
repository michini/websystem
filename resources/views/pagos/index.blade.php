@extends('layouts.layout')
@section('titulo','Pagos')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Pagos</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Pagos</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Evento</th>
                            <th>Estado</th>
                            <th>Pago</th>
                            <th>Resta</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($pagos as $pago)
                        <tr>
                            <td>{{$pago->id}}</td>
                            <td>{{$pago->contrato->evento->lugar}}</td>
                            @if($pago->estado == "cancelado")
                                <td class="success">{{$pago->estado}}</td>
                            @else
                                <td class="danger">{{$pago->estado}}</td>
                            @endif
                            <td>{{$pago->monto}}</td>
                            <td>{{$pago->resta}}</td>
                            <td class="text-center"><a href="{{route('admin.pago.edit',$pago->id)}}" class="btn btn-warning btn-xs">Editar</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection