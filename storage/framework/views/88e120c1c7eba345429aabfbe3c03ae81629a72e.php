<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="">
            <a href="<?php echo e(url('/home')); ?>"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Eventos <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="<?php echo e(route('admin.evento.create')); ?>">Crear</a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.evento.index')); ?>">Listar</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="<?php echo e(route('admin.contrato.index')); ?>"><i class="fa fa-fw fa-paper-plane"></i> Contratos</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.cliente.index')); ?>"><i class="fa fa-fw fa-users"></i> Clientes</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.paquete.index')); ?>"><i class="fa fa-fw fa-clipboard"></i> Paquetes</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.compromiso.index')); ?>"><i class="fa fa-fw fa-dropbox"></i> Compromisos</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.filmador.index')); ?>"><i class="fa fa-fw fa-video-camera"></i> Filmadores</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.pago.index')); ?>"><i class="fa fa-fw fa-money"></i> Pagos</a>
        </li>
        <?php if(Entrust::hasRole('administrador')): ?>
        <li>
            <a href="<?php echo e(route('admin.usuario.index')); ?>"><i class="fa fa-fw fa-user-md"></i> Usuarios</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.reporte.index')); ?>"><i class="fa fa-fw fa-book"></i> Reportes</a>
        </li>
        <?php endif; ?>
    </ul>
</div>