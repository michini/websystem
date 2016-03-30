@extends('layouts.layout')
@section('titulo')
    Usuario {{ucfirst($usuario->username)}}
@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar usuario {{ucfirst($usuario->username)}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            @include('flash::message')
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user"></i> Editar usuario</div>
                <div class="panel-body">
                    {!! Form::model($usuario,['route'=>['admin.usuario.update',$usuario->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('username','Usuario:',['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-7">
                            {!! Form::text('username',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email','Email:',['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-7">
                            {!! Form::email('email',null,['class'=>'form-control']) !!}
                        </div>
                    </div>
                    @if(Entrust::hasRole('administrador'))
                    <div class="form-group">
                        {!! Form::label('rol','Rol:',['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-7">
                            <select name="rol" id="" class="form-control">
                                @foreach($roles as $rol)
                                    @if($rol->display_name == $usuario->roles[0]->display_name)
                                        <option value="{{$rol->id}}" selected>{{$rol->display_name}}</option>
                                    @else
                                        <option value="{{$rol->id}}">{{$rol->display_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @endif

                    <div class="form-group">
                        {!! Form::label('password','Contraseña:',['class'=>'control-label col-lg-2']) !!}
                        <div class="col-lg-7">
                            <a href="{{route('getResetPassword')}}" class="btn btn-link">Cambiar contraseña</a>
                        </div>
                    </div>

                    {!! Form::submit('Actualizar',['class'=>'btn btn-success center-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection