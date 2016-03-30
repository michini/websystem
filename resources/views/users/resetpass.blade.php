@extends('layouts.layout')
@section('titulo','Cambiar contraseña')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cambiar contraseña</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Reset password</div>
                <div class="panel-body">
                    @include('layouts.errors')
                    {!! Form::open(['route'=>['postResetPassword','id'=>Auth::user()->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('password','Contraseña actual:',['class'=>'control-label col-lg-5']) !!}
                        <div class="col-lg-6">
                            {!! Form::password('password',['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation','Repita contraseña:',['class'=>'control-label col-lg-5']) !!}
                        <div class="col-lg-6">
                            {!! Form::password('password_confirmation',['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('oldPass','Nueva contraseña:',['class'=>'control-label col-lg-5']) !!}
                        <div class="col-lg-6">
                            {!! Form::password('newPass',['class'=>'form-control']) !!}
                        </div>
                    </div>
                    {!! Form::submit('Cambiar',['class'=>'btn btn-success center-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection