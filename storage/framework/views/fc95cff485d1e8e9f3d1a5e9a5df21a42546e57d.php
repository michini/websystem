<?php $__env->startSection('titulo','Lista de Contratos'); ?>
<?php $__env->startSection('contenido'); ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Lista de Contratos
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-calendar"></i> Contratos
                </div>
                <div class="panel-body">
                    <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <h3>Hay <?php echo $contratos->total(); ?> registros</h3>
                    <table class="table table-hover">
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Evento</th>
                            <th>Usuario</th>
                            <th>Cliente</th>
                            <td>Cuenta</td>
                            <th>Contrato PDF</th>
                        </tr>
                        <?php foreach($contratos as $contrato): ?>
                            <tr>
                                <td><?php echo e($contrato->id); ?></td>
                                <td><?php echo e($contrato->fecha_format); ?></td>
                                <td><a href="<?php echo e(route('admin.evento.show',$contrato->evento->id)); ?>"><?php echo e($contrato->evento->lugar); ?></a></td>
                                <td><?php echo e($contrato->user->username); ?></td>
                                <td><?php echo e($contrato->cliente->nombre); ?></td>
                                <td>
                                    <?php foreach($contrato->pagos as $contract): ?>
                                        <?php if($contract->estado == 'cancelado'): ?>
                                            <p class="text-success"><?php echo e($contract->estado); ?></p>
                                        <?php else: ?>
                                            <p class="text-danger"><?php echo e($contract->estado); ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </td>
                                <td style="text-align: center;"><a href="<?php echo e(route('contratoPdf',['id_con'=>$contrato->id,'id_pago'=>$contract->id,'id_comp'=>$contrato->evento->compromiso->id,'id_evento'=>$contrato->evento->id])); ?>" target="_blank"><i class="fa fa-file-pdf-o fa-2x"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php echo $contratos->links(); ?>

                    </div>
                </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>