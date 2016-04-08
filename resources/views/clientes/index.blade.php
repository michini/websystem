@extends('layouts.layout')
@section('titulo','Usuarios')
@section('contenido')
    <div class="row">
        <div class="col-lg-6">
            <h1 class="page-header">Lista de Clientes</h1>
        </div>
        <div class="col-lg-6" style="margin-top: 5%;">
            {!! Form::open(['route'=>'admin.cliente.index','method'=>'GET','class'=>'form-horizontal']) !!}
            <div class="form-group">
                {!! Form::label('buscar','Buscar:',['class'=>'col-lg-2 control-label']) !!}
                <div class="col-lg-4">
                    {!! Form::text('cliente',null,['class'=>'form-control']) !!}
                </div>
                {!! Form::submit('Buscar',['class'=>'btn btn-default']) !!}
                <a href="{{route('admin.cliente.index')}}" class="btn btn-link btn-xs">Ver todos</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Celular</th>
                    <th>Direccion</th>
                    <th>Familia</th>
                </tr>
                @foreach($clientes as $cliente)
                <tr>
                    <td><i class="fa fa-user fa-2x"></i></td>
                    <td><a href="{{route('admin.cliente.show',$cliente->id)}}">{{$cliente->nombre}}</a></td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->celular}}</td>
                    <td>{{$cliente->direccion}}</td>
                    <td>{{$cliente->familia}}</td>
                </tr>
                @endforeach
            </table>
            {!! $clientes->links() !!}
        </div>
    </div>
@endsection