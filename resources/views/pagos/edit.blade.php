@extends('layouts.layout')
@section('titulo','Actualizar pago')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Actualizar Pago</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Actualizar pago</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::open(['route'=>['admin.pago.update',$pago->id],'method'=>'PUT','class'=>'form-horizontal']) !!}
                    <div class="form-group">
                        {!! Form::label('adeuda','Adeuda:',['class'=>'control-label col-lg-4']) !!}
                        <div class="col-lg-5">
                            {!! Form::text('adeuda',$pago->resta,['class'=>'form-control','disabled']) !!}
                        </div>
                    </div>
                    <div class="radio col-lg-offset-4">
                        <label>
                            <input type="radio" name="estado" id="optionsRadios1" value="adelanto">
                            Amortizar
                        </label>
                    </div>
                    <div class="radio col-lg-offset-4">
                        <label>
                            <input type="radio" name="estado" id="cancelar" value="cancelado">
                            Cancelar
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="monto" class="control-label col-lg-4">Monto:</label>
                        <div class="input-group col-lg-5">
                            <span class="input-group-addon"><span class="fa fa-dollar"></span>
                            </span>
                            <input type="text" class="form-control" id="monto" name="monto">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-4">
                            {!! Form::submit('Guardar',['class'=>'btn btn-success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection