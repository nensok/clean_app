
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>CleanUp | CleanerPage</title>

  <link rel="stylesheet" href="/css/app.css">

  

</head>
<body>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-primary navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link mr-3"  href="/home">CLean <i class="fas fa-trash"></i> Up</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link"></a>
      </li>
     
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link bg-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
            {{ __('Logout') }} <i class="fa fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
            </form>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
        class="fa fa-th-large"></i></a>
      </li>
    </ul>
    <!--/ Right navbar links -->
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
    </div>
    <!-- /.content-header -->

    @yield('content')

    <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer bg-primary">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Making everything sparkle 
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Clean-Up</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->
<script src="/js/app.js"></script>
</body>
</html>

