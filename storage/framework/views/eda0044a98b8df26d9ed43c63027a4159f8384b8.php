<?php $__env->startSection('titulo'); ?>
    Inicio
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/calendar/css/fullcalendar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/calendar/css/fullcalendar.print.css')); ?>" media="print">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                S.I.S.C.E. <small>Sistema de Control de Eventos</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Panel
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($eventos_pasado); ?></div>
                            <div>Eventos pasados</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('eventoPasado')); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Ver mas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($eventos_hoy); ?></div>
                            <div>Eventos para hoy</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('eventoHoy')); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Ver mas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($eventos_proximo); ?></div>
                            <div>Eventos próximos</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('eventoProximo')); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Ver mas</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo e($eventos_total); ?></div>
                            <div>Eventos</div>
                        </div>
                    </div>
                </div>
                <a href="<?php echo e(route('admin.evento.index')); ?>">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-calendar"></i> Calendario de eventos</div>
                <div class="panel-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-calendar"></i> Proximos eventos</div>
                <div class="panel-body">
                    <?php foreach($eventos as $evento): ?>
                        <a href="<?php echo e(route('admin.evento.show',$evento->id)); ?>"><div class="well"><?php echo e($evento->lugar); ?></div></a>
                    <?php endforeach; ?>
                    <div class="pull-right"><a href="<?php echo e(route('admin.evento.index')); ?>" class="btn btn-primary">Ver todos</a></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('plugins/calendar/js/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/calendar/js/fullcalendar.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/calendar/js/lang-all.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/calendar/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>