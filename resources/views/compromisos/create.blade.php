@extends('layouts.layout')
@section('titulo','Crear compromiso')
@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Nuevo compromiso</h1>
        </div>
    </div>
    <div class="row" ng-app="compromiso" ng-controller="comCtrl">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Nuevo compromiso</div>
                <div class="panel-body">
                    <form class="form-horizontal" ng-submit="submit()" id="form-com">
                    <div class="form-group" ng-class="{'has-error':errors.nombre.length==1}">
                        {!! Form::label('Nombre','Nombre:',['class'=>'control-label col-lg-4']) !!}
                        <div class="col-lg-6">
                            {!! Form::text('nombre',null,['class'=>'form-control','ng-model'=>'com.nombre']) !!}
                            <span class="help-block">@{{ errors.nombre[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group" ng-class="{'has-error':errors.descripcion.length==1}">
                        {!! Form::label('Descripcion','Descripcion:',['class'=>'control-label col-lg-4']) !!}
                        <div class="col-lg-6">
                            {!! Form::textarea('descripcion',null,['class'=>'form-control','ng-model'=>'com.descripcion']) !!}
                            <span class="help-block">@{{ errors.descripcion[0] }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 col-lg-offset-4">
                            <button type="button" class="btn btn-primary" ng-click="submit()">Enviar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">

        </div>
    </div>
@endsection
@section('js')
    <script>
        var compromiso = angular.module('compromiso',[])
        compromiso.controller('comCtrl',function ($scope,$http) {
            $scope.submit = function (e) {
                $http({
                    method:'POST',
                    url:'http://localhost/proyectos/laravel/public/admin/compromiso',
                    data:$('#form-com').serialize(),
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                }).then(function success(response) {
                    console.log(response.data)
                    $scope.errors = response.data.errors
                    $scope.mensaje = response.data.mensaje
                    if (!jQuery.isEmptyObject($scope.mensaje)){
                        $("#form-com")[0].reset()
                        //swal("Buen trabajo!", $scope.mensaje, "success")
                        toastr.success($scope.mensaje, 'Exitoso', {timeOut: 5000})
                    }

                },function error(response) {
                    console.log(response)
                });
            }
        });

        compromiso.config(function ($httpProvider) {
            $httpProvider.
            when('/crear',{
                templateUrl:''
            }).
            when('/data',{

            }).
            otherwise({
                redirectTo: 'home'
            })
        })
    </script>
@endsection