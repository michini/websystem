@extends('layouts.layout')
@section('titulo','Lista de Contratos')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Lista de Contratos
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar"></i> Contratos
                </div>
                <div class="panel-body">
                    @include('flash::message')
                    <h3>Hay {!! $contratos->total() !!} registros</h3>
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Evento</th>
                            <th>Usuario</th>
                            <th>Cliente</th>
                            <td>Cuenta</td>
                            <th>Contrato PDF</th>
                        </tr>
                        @foreach($contratos as $contrato)
                            <tr>
                                <td>{{$contrato->id}}</td>
                                <td>{{$contrato->fecha_format}}</td>
                                <td><a href="{{route('admin.evento.show',$contrato->evento->id)}}">{{$contrato->evento->lugar}}</a></td>
                                <td>{{$contrato->user->username}}</td>
                                <td>{{$contrato->cliente->nombre}}</td>
                                <td>
                                    @foreach($contrato->pagos as $contract)
                                        @if($contract->estado == 'cancelado')
                                            <p class="text-success">{{$contract->estado}}</p>
                                        @else
                                            <p class="text-danger">{{$contract->estado}}</p>
                                        @endif
                                    @endforeach
                                </td>
                                <td style="text-align: center;"><a href="{{route('contratoPdf',['id_con'=>$contrato->id,'id_pago'=>$contract->id,'id_comp'=>$contrato->evento->compromiso->id,'id_evento'=>$contrato->evento->id])}}" target="_blank"><i class="fa fa-file-pdf-o fa-2x"></i></a></td>
                            </tr>
                        @endforeach
                    </table>
                    {!! $contratos->links() !!}
                    </div>
                </div>
        </div>
    </div>
@endsection
