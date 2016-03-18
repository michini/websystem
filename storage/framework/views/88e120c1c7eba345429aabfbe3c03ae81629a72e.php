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
            <a href="forms.html"><i class="fa fa-fw fa-users"></i> Clientes</a>
        </li>
        <li>
            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-clipboard"></i> Paquetes</a>
        </li>
        <li>
            <a href="bootstrap-grid.html"><i class="fa fa-fw fa-dropbox"></i> Compromisos</a>
        </li>
        <li>
            <a href="blank-page.html"><i class="fa fa-fw fa-video-camera"></i> Filmadores</a>
        </li>
        <li>
            <a href="index-rtl.html"><i class="fa fa-fw fa-money"></i> Pagos</a>
        </li>
        <li>
            <a href="index-rtl.html"><i class="fa fa-fw fa-user-md"></i> Usuarios</a>
        </li>
    </ul>
</div>