<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('titulo')</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="{{asset('css/sweetalert.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <!-- import -->
  @yield('css')

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
  @include('layouts.nav')

  <div id="page-wrapper">

    <div class="container-fluid">

    @yield('contenido')

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{asset('js/jquery.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<script src="{{asset('js/angular.min.js')}}"></script>

<script src="{{asset('js/sweetalert.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- import -->
@yield('js')

</body>

</html>