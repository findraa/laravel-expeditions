<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/img/AdminLTELogo.png"
    type="image/x-icon">

  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/css/adminlte.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="https://kit.fontawesome.com/6f65dcd7f8.js" crossorigin="anonymous"></script>

  <livewire:styles />

  <!-- Scripts -->
  <script defer src="{{ asset('vendor/alpine.js') }}"></script>
</head>
<body class="hold-transition layout-top-nav">

  <div class="wrapper">
    <!-- Navbar -->
    @include('components.navmenu')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        @yield('content-header')
      </div>
      <!-- /.content-header -->
      <!-- Main content -->
      <div class="content">
        @yield('content')
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To the right -->
      <div class="float-right d-none d-sm-inline">
        <b>Ver</b> 1.0.0
      </div>
      <!-- Default to the left -->
      <strong>&copy; <script>
          document.write(new Date().getFullYear());
        </script> <a href="https://adminlte.io">Anugrah Indah</a>.</strong>
    </footer>
  </div>
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.4/js/adminlte.min.js"></script>

  <livewire:scripts />

  <script src="{{ mix('js/app.js') }}" defer></script>
  @isset($script)
  {{ $script }}
  @endisset
</body>
</html>
