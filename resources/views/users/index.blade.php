@extends('layouts.layout')
@section('titulo','Usuarios')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Lista de Usuarios</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-users"></i> Lista de usuarios</div>
            <div class="panel-body">
                @foreach($usuarios as $usuario)
                <div class="row">
                    <div class="col-lg-2 text-center">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-lg-7">
                        <p class="text-left"><b>Usuario:</b> {{ucfirst($usuario->username)}}</p>
                        <p class="text-left"><b>Email:</b> {{$usuario->email}}</p>
                        <p class="text-left"><b>Rol(es):</b> @foreach($usuario->roles as $rol) {{$rol->display_name}}@endforeach</p>
                    </div>
                    <div class="col-lg-3 text-center" style="">
                        <a href="{{route('admin.usuario.edit',$usuario->id)}}" class="btn btn-warning btn-block"><i class="fa fa-edit"></i> Editar</a>
                        <br>
                        {!! Form::open(['route'=>['admin.usuario.destroy',$usuario->id],'method'=>'DELETE']) !!}
                        <button type="submit" class="btn btn-danger btn-block   "><i class="fa fa-remove"></i> Eliminar</button>
                        {!! Form::close() !!}
                    </div>
                </div>
                    <hr>
                @endforeach
                {!! $usuarios->links() !!}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">Opciones</div>
            <div class="panel-body">
                <a href="{{route('admin.usuario.create')}}" class="btn btn-primary btn-block">Nuevo</a>
            </div>
        </div>
    </div>
</div>
@endsection