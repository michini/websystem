<?php $__env->startSection('titulo'); ?>
    Evento <?php echo e($evento->lugar); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/timepicker/css/bootstrap-datetimepicker.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Evento <?php echo e($evento->lugar); ?>

            </h1>
        </div>
    </div>
    <div class="row">
        <?php echo Form::model($evento,['route'=>['admin.evento.update',$evento->id],'method'=>'PUT','class'=>'form-horizontal']); ?>

        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-check-circle-o"></i> Detalles del evento
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="lugar" class="col-lg-2 control-label">Lugar:</label>
                        <div class="col-lg-10">
                            <?php echo Form::text('lugar',null,['class'=>'form-control']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker4" class="col-lg-2 control-label">Fecha:</label>
                        <div class='input-group date col-lg-5' id='datetimepicker4' style="padding-left: 14px;">
                            <?php echo Form::text('fecha',null,['class'=>'form-control']); ?>

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker3" class="col-lg-2 control-label">Hora:</label>
                        <div class='input-group date col-lg-5' id='datetimepicker3' style="padding-left: 14px;">
                            <?php echo Form::text('hora',null,['class'=>'form-control']); ?>

                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-lg-2 control-label">Descripción:</label>
                        <div class="col-lg-10">
                            <?php echo Form::textarea('descripcion',null,['class'=>'form-control','rows'=>'3']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paquete" class="col-lg-2 control-label">Paquete: </label>
                        <div class="col-lg-4">
                            <select name="paquete" id="" class="form-control">
                                <?php foreach($paquetes as $paquete): ?>
                                    <?php if($evento->paquete->tipo === $paquete->tipo): ?>
                                        <option value="<?php echo e($paquete->id); ?>" selected><?php echo e($paquete->tipo); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($paquete->id); ?>"><?php echo e($paquete->tipo); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <label for="" class="col-lg-2 control-label">Precio:</label>
                        <div class="col-lg-3">
                            <?php echo Form::text('estado',$evento->paquete->precio,['class'=>'form-control','disabled']); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="compromiso" class="col-lg-2 control-label">Compromiso: </label>
                        <div class="col-lg-4">
                            <select name="compromiso" id="" class="form-control">
                                <?php foreach($compromisos as $compromiso): ?>
                                    <?php if($evento->compromiso->nombre === $compromiso->nombre): ?>
                                        <option value="<?php echo e($compromiso->id); ?>" selected><?php echo e($compromiso->nombre); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($compromiso->id); ?>"><?php echo e($compromiso->nombre); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="compromiso" class="col-lg-2 control-label">Estado: </label>
                        <div class="col-lg-4">
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="" selected disabled>Selecione nuevo estado</option>
                                <option value="En proceso">En proceso</option>
                                <option value="Editando">Editando</option>
                                <option value="Entregado">Entregado</option>
                                <option value="No entregado">No entregado</option>
                                <option value="Finalizazo">Finalizazo</option>
                                <option value="Por entregar">Por entregar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">Opciones</div>
                <div class="panel-body">
                    <p class="text-center">Filmadores del evento</p>
                    <ul class="list-group" id="master">
                        <?php foreach($evento->filmadores as $filmador): ?>
                            <li class="list-group-item" id="lista"><i onclick='$(this).parent().remove()' class='fa fa-remove pull-right btn btn-xs btn-danger'></i><?php echo e($filmador->nombre); ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal">Cambiar</a>
                    <?php echo $__env->make('eventos.partials.modalfilmador', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
            <div class="well">
                <button type="submit" class="btn btn-success btn-lg center-block">Actualizar</button>
            </div>
        </div>
        <?php echo Form::close(); ?>

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
                $("#desa").hide()
                $("#lista").remove()
                $('.list-group').append("<li id='remove' class='list-group-item'>"+$(this).attr('text')+"<i onclick='$(this).parent().remove()' class='fa fa-remove pull-right btn btn-xs btn-danger'></i></li>");
            }
            else if(!$(this).is(':checked')){
                $("#remove").remove();
            }
        });
        $(document).ready(function(){
            if(!$('#lista').length){
                $(".list-group").append("<li id='desa' class='list-group-item'>Filmador no definido <a class='pull-right' data-toggle='modal' data-target='#modal'></a></li>")
                $('#btn-hidden').show();
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>