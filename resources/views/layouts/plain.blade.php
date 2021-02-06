
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>CleanUp | 2ndlogin</title>

  <link rel="stylesheet" href="/css/app.css">

</head>
<body>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-dark navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link mr-3"  href="/home">CLean <i class="fas fa-trash"></i> Up</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
        class="fa fa-th-large"></i></a>
      </li>
    </ul>
    <!--/ Right navbar links -->
  </nav>
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="background-image:url('./images/banner.jpg'); background-size: cover;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><br><br><br><br><br><br>
    @yield('content')

    <!-- /.container-fluid -->
    </div>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer bg-dark">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Making everything sparkle
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">CleanUp</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>
</body>
</html>

