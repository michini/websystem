@extends('layouts.layout')
@section('titulo','Crear usuario')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Crear usuario</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-plus-circle"></i> Registrar usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.usuario.store') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Usuario:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {!! Form::label('email','Email:',['class'=>'control-label col-md-4']) !!}
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('rol','Rol:',['class'=>'control-label col-md-4']) !!}
                            <div class="col-lg-4">
                                {!! Form::select('rol',['1'=>'Administrador','2'=>'Responsable','3'=>'Usuario'],null,['class'=>'form-control']) !!}
                                @if($errors->has('rol'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('rol')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
