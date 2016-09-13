<?php $__env->startSection('titulo','Lista de Eventos'); ?>
<?php $__env->startSection('css'); ?>
    <style>
        #nav.affix {
            position: fixed;
            top: 50px;
            width: 18%;
            z-index:10;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="row" id="cabecera">
        <div class="col-lg-12">
            <h1 class="page-header">
                Lista de Eventos
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9" role="main">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-envelope"></i> Eventos</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4 class="">Hay <?php echo $eventos->total(); ?> registros en total</h4>
                        </div>
                        <div class="col-lg-4 col-lg-offset-4">
                            <h4 class="pull-right">Hay <?php echo $eventos->count(); ?> registros en la vista</h4>
                        </div>
                    </div>
                    <br>
                    <?php foreach($eventos as $evento): ?>
                        <div class="col-sm-5 col-md-3">
                            <div class="thumbnail">

                                <div class="caption">
                                    <h4><?php echo e($evento->lugar); ?></h4>
                                    <?php if(!isset($evento->nombre)): ?>
                                            <p><?php echo e($evento->contrato->cliente->nombre); ?></p>
                                    <?php else: ?>
                                        <p><?php echo e($evento->nombre); ?></p>
                                    <?php endif; ?>
                                    <p><a href="<?php echo e(route('admin.evento.show',$evento->id)); ?>" class="btn btn-primary" role="button">Ver</a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-lg-5">
                        <?php echo $eventos->links(); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3" role="complementary">
            <nav class="" data-offset-top="60" data-offset-bottom="200" id="nav">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-pencil-square-o"></i> Busquedas</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo Form::open(['route'=>'admin.evento.index','method'=>'GET','role'=>'form']); ?>

                                <?php echo Form::label('search','Buscar por lugar'); ?>

                                <?php echo Form::text('lugar',null,['class'=>'form-control','id'=>'search','placeholder'=>'lugar de evento']); ?>

                                <br>
                                <?php echo Form::submit('Buscar',['class'=>'btn btn-primary pull-right']); ?>

                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo Form::open(['route'=>'clientes','method'=>'GET','role'=>'form']); ?>

                                <?php echo Form::label('cliente','Buscar por cliente'); ?>

                                <?php echo Form::text('cliente',null,['class'=>'form-control','id'=>'cliente','placeholder'=>'nombre del cliente']); ?>

                                <br>
                                <?php echo Form::submit('Buscar',['class'=>'btn btn-primary pull-right']); ?>

                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <i class="fa fa-comments"> Filtros</i>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <br>
                                <a href="<?php echo e(route('admin.evento.index')); ?>" class="btn-block btn btn-primary">Todos los eventos</a>
                                <a href="<?php echo e(route('conFilmador')); ?>" class="btn-block btn btn-success">Eventos con filmador</a>
                                <a href="<?php echo e(route('sinFilmador')); ?>" class="btn-block btn btn-danger">Eventos sin filmador</a>
                                <a href="<?php echo e(route('eventoProximo')); ?>" class="btn-block btn btn-info">Eventos Proximos</a>
                                <a href="<?php echo e(route('eventoPasado')); ?>" class="btn-block btn btn-info">Eventos Pasados</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        $('#nav').affix({
            offset: {
                top: $('#cabecera').height()
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>