<?php $__env->startSection('titulo'); ?>
    Crear Evento
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/timepicker/css/bootstrap-datetimepicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Crear nuevo evento
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Panel
                </li>
                <li class="active">
                    <i class="fa fa-plus-circle"></i> Evento
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div  class="col-lg-8">
            <div class="well">
                <?php echo Form::open(['route'=>'admin.evento.store','method'=>'POST','role'=>'form','class'=>'form-horizontal']); ?>

                <div class="form-group">
                    <label for="lugar" class="col-lg-2 control-label">Lugar:</label>
                    <div class="col-lg-10">
                        <input name="lugar" type="text" class="form-control" id="lugar" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datetimepicker4" class="col-lg-2 control-label">Fecha:</label>
                    <div class='input-group date col-lg-5' id='datetimepicker4' style="padding-left: 14px;">
                        <input name="fecha" type='text' class="form-control" required/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="datetimepicker3" class="col-lg-2 control-label">Hora:</label>
                    <div class='input-group date col-lg-5' id='datetimepicker3' style="padding-left: 14px;">
                        <input name="hora" type='text' class="form-control" required/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-lg-2 control-label">Descripción:</label>
                    <div class="col-lg-10">
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="estado" class="col-lg-2 control-label">Estado: </label>
                    <div class="col-lg-5">
                        <select name="estado" id="estado" class="form-control" required>
                            <option value="En proceso">En proceso</option>
                            <option value="Editando">Editando</option>
                            <option value="Entregado">Entregado</option>
                            <option value="No entregado" selected>No entregado</option>
                            <option value="Finalizazo">Finalizazo</option>
                            <option value="Por entregar">Por entregar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="paquete" class="col-lg-2 control-label">Paquete: </label>
                    <div class="col-lg-5">
                        <select name="paquete" id="paquete" class="form-control" required>
                            <option value="" disabled selected>Seleccione un paquete</option>
                            <?php foreach($paquetes as $paquete): ?>
                                <option value="<?php echo e($paquete->id); ?>"><?php echo e($paquete->tipo); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="compromiso" class="col-lg-2 control-label">Compromiso: </label>
                    <div class="col-lg-5">
                        <select name="compromiso" id="compromiso" class="form-control" required>
                            <option value="" disabled selected>Seleccione un compromiso</option>
                            <?php foreach($compromisos as $compromiso): ?>
                                <option value="<?php echo e($compromiso->id); ?>"><?php echo e($compromiso->nombre); ?></option>
                            <?php endforeach; ?>
                            <option value="other">Otro</option>
                        </select>
                    </div>
                    <div class="col-lg-5" id="other">
                        <input  type="text" class="form-control" placeholder="Tipo de compromiso...." name="comp">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="well">
                <p class="text-center">Filmadores disponibles</p>
                <a class="btn btn-primary center-block" data-toggle="modal" data-target="#modal">Definir Filmador</a>
                <ul class="list-group" style="padding-top: 10px;"></ul>
                <?php echo $__env->make('eventos.partials.modalfilmador', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div class="well">
                <button type="submit" class="btn btn-success center-block btn-lg">Guardar</button>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('plugins/timepicker/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/timepicker/js/bootstrap-datetimepicker.min.js')); ?>"></script>
    <script>
        $(function () {
            $('#datetimepicker3').datetimepicker({
                format: 'LT'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'YYYY/MM/DD'
            });
        });

        $('.chk').on('click',function(){
            if($(this).is(':checked') ){
                $('.list-group').append("<li id='remove' class='list-group-item'>"+$(this).attr('text')+"<i onclick='$(this).parent().remove()' class='fa fa-remove pull-right btn btn-xs btn-danger'></i></li>");
            }
            else if(!$(this).is(':checked')){
                $("#remove").remove();
            }
        });
        $('#other').hide();
        $('select#compromiso').on('change',function(){
            var valor = $(this).val();
            if(valor == "other"){
                $('#other').show();
            }
            else if(valor != "other"){
                $('#other').hide();
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>