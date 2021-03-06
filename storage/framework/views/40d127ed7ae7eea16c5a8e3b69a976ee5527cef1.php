<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $__env->yieldContent('titulo'); ?></title>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo e(asset('css/sb-admin.css')); ?>" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?php echo e(asset('font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

  <!-- import -->
  <?php echo $__env->yieldContent('css'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

<div id="wrapper">

  <!-- Navigation -->
  <?php echo $__env->make('layouts.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <div id="page-wrapper">

    <div class="container-fluid">

    <?php echo $__env->yieldContent('contenido'); ?>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('js/jquery.js')); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>

<!-- import -->
<?php echo $__env->yieldContent('js'); ?>

</body>

</html>