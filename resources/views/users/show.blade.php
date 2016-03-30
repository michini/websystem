@extends('layouts.layout')
@section('titulo')
    Perfil {{$usuario->username}}
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Perfil</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-delicious"></i> Perfil</div>
                <div class="panel-body">
                    <form action="" class="form-horizontal">
                    <div class="form-group">
                        {!! Form::label('username','Usuario:',['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-7">
                            {!! Form::text('username',$usuario->username,['class'=>'form-control','disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','Email:',['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-7">
                            {!! Form::email('email',$usuario->email,['class'=>'form-control','disabled']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('rol','Rol:',['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-7">
                            <select name="rol" id="rol" class="form-control" disabled>
                                <option value="" selected>{{$usuario->roles[0]->display_name}}</option>
                            </select>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Opciones</div>
                <div class="panel-body">
                    <a href="{{route('admin.usuario.edit',$usuario->id)}}" class="btn btn-warning btn-block">Editar</a>
                    <a href="{{route('userContracts',$usuario->id)}}" class="btn btn-primary btn-block">Mis contratos</a>
                </div>
            </div>
        </div>
    </div>
@endsection