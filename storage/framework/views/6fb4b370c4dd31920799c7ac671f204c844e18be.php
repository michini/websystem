<?php $__env->startSection('titulo','Pago'); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Crear nuevo pago
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i> Panel
                </li>
                <li class="active">
                    <i class="fa fa-plus-circle"></i> Pago
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="well">

            </div>
        </div>
        <div class="col-lg-4">
            <div class="well">

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>