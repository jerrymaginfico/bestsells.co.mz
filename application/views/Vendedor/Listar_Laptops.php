<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">

  <title><?php echo get_phrase('BestSells | Lista de Laptops');?></title>
  <link rel="shortcut icon" href="<?php echo base_url();?>bestsells/img/bestlogo.png">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/dist/css/adminlte.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/vendedor/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('Vendedor/Editar_Perfil/'.$result->vend_id);?>">
          <i class="far fa-user"></i>
        </a>
      </li>
      <!-- Notifications Dropdown Menu -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url('Home/index');?>" class="brand-link">
      <img src="<?=base_url('bestsells/img/bestlogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo get_phrase('Best$ells');?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <img src="<?=base_url('assets/img/vendedor.png');?>" class="img-circle elevation-2 img-responsive" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url('Vendedor/Editar_Perfil/'.$result->vend_id);?>" class="d-block" title="<?=$result->nome_completo;?>">
            <?=word_limiter($result->nome_completo,2);?>
            </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo base_url('Vendedor/Dashboard');?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('Vendedor/Adicionar');?>" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p>
                Adicionar
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
          <br>
          <br>
          <br>
          <br>
          <br>
          <li class="nav-header"><b><?php echo get_phrase('--- SUPORTE');?></b></li>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-sm">
              <i class="nav-icon fa fa-info"></i>
              <p><?php echo get_phrase('Ajuda & Contacto');?></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>Vendedor/Logout" class="nav-link">
              <i class="nav-icon fa fa-arrow-circle-left"></i>
              <p><?php echo get_phrase('Terminar Sessao');?></p>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Best$ells</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('Home/index');?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Lista de Laptop's</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Produtos Vendidos</span>
                <span class="info-box-number">
                  <?=count($sold);?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-credit-card"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo get_phrase('Load...');?></span>
                <span class="info-box-number"><?php echo get_phrase('Load...');?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-box-open"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Produtos Online</span>
                <span class="info-box-number"><?=count($online);?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-ban"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Produtos Suspensos</span>
                <span class="info-box-number"><?=count($suspended);?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
         <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header">
                <?=form_open('Vendedor/Listar_Produtos');?>
                <ul id="show_listing">
                 <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <select class="custom-select" id="listing_type" name="listing_type" style="width: 100%;" required>
                          <option value="" disabled><?php echo get_phrase('Deseja Listar?');?></option>
                          <option value="carros particulares"><?php echo get_phrase('Carros Particulares');?></option>
                          <option value="geleiras & congeladores"><?php echo get_phrase('Geleiras & Congeladores');?></option>
                          <option value="celulares"><?php echo get_phrase('Celulares');?></option>
                          <option value="laptops" selected><?php echo get_phrase('Laptops');?></option>
                          <option value="camisas masculinas"><?php echo get_phrase('Camisas Masculinas');?></option>
                          <option value="camisas femeninas"><?php echo get_phrase('Camisas Femeninas');?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-9">
                      <div class="form-group">
                       <button type="submit" class="btn btn-primary"><?php echo get_phrase('Listar');?>&nbsp;&nbsp;<span class="fa fa-list"></span></button>
                      </div>
                    </div>
                  </div>
                </ul>
                <?=form_close();?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nome do Produto</th>
                    <th>Estado</th>
                    <th>Preco</th>
                    <th>Data</th>
                    <th>Operacoes</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php if(count($laptop)):?>
                      <?php foreach($laptop as $lap):?>
                  <tr>
                    <td><?=$lap->lap_title;?></td>
                    <td><?=$lap->product_status;?></td>
                    <td><?=number_format($lap->product_price);?></td>
                    <td><?=$lap->data_cadastro;?></td>
                    <td>
                      <center>
                      <a href="<?=base_url('Vendedor/Editar_Laptop/'.$lap->lap_id);?>" title="Editar Dados" class="btn btn-info btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="<?=base_url('Vendedor/Change_Laptop_Status/'.$lap->lap_id);?>" class="btn btn-warning btn-circle btn-sm" title="Editar Estado"><i class="fa fa-ban"></i></a>
                      <a href="<?=base_url('Vendedor/Eliminar_Laptop/'.$lap->lap_id);?>" title="Remover Produto" class="btn btn-danger btn-circle btn-sm text-white"><i class="fa fa-times"></i></a>
                      </center>
                    </td>
                  </tr>
                <?php endforeach;
                else:?>
                  <tr>
                    <td colspan="5"><?php echo get_phrase('Lista Nao Encontrada.');?></td>
                  </tr>
                <?php endif;?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nome do Produto</th>
                    <th>Categoria</th>
                    <th>Preco</th>
                    <th>Data</th>
                    <th>Operacoes</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

     </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://xit2s.co.mz">Xtreme IT & Software Solution</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/vendedor/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/vendedor/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/vendedor//plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/vendedor//plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>assets/vendedor/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url();?>assets/vendedor/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url();?>assets/vendedor/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url();?>assets/vendedor/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url();?>assets/vendedor/dist/js/pages/dashboard2.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>