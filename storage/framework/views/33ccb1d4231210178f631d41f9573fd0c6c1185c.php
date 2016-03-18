<?php $__env->startSection('titulo','Nuevo Contrato'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0-beta.1/themes/smoothness/jquery-ui.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Crear nuevo contrato
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Panel
                </li>
                <li class="active">
                    <i class="fa fa-plus-circle"></i> Contrato
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="lugar" class="col-lg-2 control-label">Lugar:</label>
                        <div class="col-lg-10">
                            <input name="lugar" type="text" class="form-control" id="lugar" value="<?php echo e($ultimo->lugar); ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker4" class="col-lg-2 control-label">Fecha:</label>
                        <div class='input-group date col-lg-5' id='datetimepicker4' style="padding-left: 14px;">
                            <input name="fecha" type='text' class="form-control" value="<?php echo e($ultimo->fecha); ?>" disabled/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datetimepicker3" class="col-lg-2 control-label">Hora:</label>
                        <div class='input-group date col-lg-5' id='datetimepicker3' style="padding-left: 14px;">
                            <input name="hora" type='text' class="form-control" value="<?php echo e($ultimo->hora); ?>" disabled/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-lg-2 control-label">Descripción:</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" id="descripcion" name="descripcion" disabled><?php echo e($ultimo->descripcion); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="estado" class="col-lg-2 control-label">Estado: </label>
                        <div class="col-lg-5">
                            <select name="estado" id="estado" class="form-control" disabled>
                                <option><?php echo e($ultimo->estado); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paquete" class="col-lg-2 control-label">Paquete: </label>
                        <div class="col-lg-5">
                            <select name="paquete" id="paquete" class="form-control" disabled>
                                <option><?php echo e($ultimo->paquete->tipo); ?></option>
                            </select>
                        </div>
                        <label for="" class="col-lg-2 control-label">Precio:</label>
                        <div class="col-lg-3">
                            <input type="text" value="<?php echo e($ultimo->paquete->precio); ?>" id="monto_paquete" class="form-control" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="compromiso" class="col-lg-2 control-label">Compromiso: </label>
                        <div class="col-lg-5">
                            <select name="compromiso" id="compromiso" class="form-control" disabled>
                                <option><?php echo e($ultimo->compromiso->nombre); ?></option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="well">
                <?php echo Form::open(['route'=>['admin.contrato.store','id_evento'=>$ultimo->id],'method'=>'POST','role'=>'form','class'=>'form-horizontal']); ?>

                <div class="radio">
                    <label>
                        <input type="radio" name="estado" id="optionsRadios1" value="adelanto" required>
                        Pagar un adelanto
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="estado" id="cancelar" value="cancelado" required>
                        Cancelar
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <label for="monto" class="control-label col-sm-4 pull-left">Monto:</label>
                    <div class="input-group col-sm-7">
                        <span class="input-group-addon">
                            <span class="fa fa-dollar"></span>
                        </span>
                        <input type="text" class="form-control" id="monto" name="monto" required>
                    </div>
                </div>
            </div>
            <div class="well">
                <div class="form-group">
                    <label for="search" class="control-label ">Cliente:</label>
                    <div class="input-group ">
                        <span class="input-group-addon">
                            <span class="fa fa-search"></span>
                        </span>
                        <input type="text" class="form-control" id="search" name="cliente" required/>
                    </div>
                    <button type="button" class="btn btn-link center-block" data-toggle="modal" data-target="#modalcliente">
                        <i class="fa fa-plus-circle"></i> Nuevo
                    </button>
                </div>
                <button type="submit" class="btn btn-success btn-block">Finalizar</button>
                <?php echo Form::close(); ?>


                <?php echo Form::open(['route'=>'admin.cliente.store','method'=>'POST','role'=>'form','class'=>'form-horizontal']); ?>

                <div class="modal fade" id="modalcliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Registrar nuevo cliente</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="form-group">
                                            <label for="search" class="control-label">Nombre:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-user"></span>
                                                </span>
                                                <input type="text" class="form-control" id="search" name="nombre"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="search" class="control-label">Apellido:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-user-md"></span>
                                                </span>
                                                <input type="text" class="form-control" id="search" name="apellido"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="search" class="control-label">Celular:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-phone"></span>
                                                </span>
                                                <input type="tel" class="form-control" id="search" name="celular"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="search" class="control-label">Direccion:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-arrow-circle-o-up"></span>
                                                </span>
                                                <input type="text" class="form-control" id="search" name="direccion"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="search" class="control-label">Familia:</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <span class="fa fa-users"></span>
                                                </span>
                                                <input type="text" class="form-control" id="search" name="familia"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="https://code.jquery.com/ui/1.12.0-beta.1/jquery-ui.js"   integrity="sha256-VtM6C/Wx3Hel6RN5y/a6rRAHGWi+FdmGUEOK5SW1wvA="   crossorigin="anonymous"></script>
    <script>
        var data = <?php echo $clientes1; ?>

        $('#search').autocomplete({
            source:data,
            autoFocus:false
        });

        var monto = $('#monto_paquete').val();
        $("#cancelar").click(function(){
            $('#monto').attr('value',monto);
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>