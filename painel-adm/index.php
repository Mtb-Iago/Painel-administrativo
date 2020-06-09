<?php


@session_start();
include_once("../conexao.php");
if(@$_SESSION['nivel_usuario'] != 'Admin'){
  echo "<script language='javascript'>window.location='../login.php'; </script>";
}

//ESTRUTURA DO MENU
$item1 = 'home';
$item2 = 'produtos';



//CLASSE PARA ITENS ATIVOS

if(@$_GET['acao'] == $item1){
    $item1active = 'active';
  }else if(@$_GET['acao'] == $item2){
    $item2active = 'active';
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Painel do Administrador</title>

 <link rel="icon" href="../images/favicon-nova.ico" type="image/x-icon">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link href="dist/css/painel.css" rel="stylesheet">



   
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script></head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">

      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?acao=<?php echo $item1; ?>" class="nav-link <?php echo $item1active ?>">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php?acao=<?php echo $item2; ?>" class="nav-link <?php echo $item2active ?>">Produtos</a>
      </li>

    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
        <?php// echo $_SESSION['nome_usuario'];
                  ?>ARTES DA LU
          <i class="fas fa-sign-out-alt"></i>
         
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../imagens/usuario-icone.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo @$_SESSION['nome_usuario'];
                  ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star text-success"></i></span>
                </h3>
                <small><?php echo @$_SESSION['email_usuario'] ?></small>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="../logout.php" title="Sair" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../imagens/logout.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Sair do Site
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Voltar para o Login</p>
                
              </div>
            </div>
            <!-- Message End -->
          </a>
          
      </li>
      <!-- Notifications Dropdown Menu -->
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
     
      <span class="brand-text font-weight-light">Painel Administrativo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../imagens/img.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo "LUISA" ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="index.php?acao=<?php echo $item1; ?>" class="nav-link <?php echo $item1active ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php?acao=<?php echo $item2; ?>" class="nav-link <?php echo $item2active ?>">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Produtos                
              </p>
            </a>
          </li>

                   
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!--Chamada dos includes das paginas -->
    <?php

    if(@$_GET['acao'] == $item1){
      include_once($item1.'.php');
    }else if(@$_GET['acao'] == $item2){
      include_once($item2.'.php');
    }
  else{
      include_once($item1.'.php');
    }
    ?>

  </div>
 
  <aside class="control-sidebar control-sidebar-dark">
   
  </aside>
  

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Nyabhing Technology</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>

</body>
</html>
